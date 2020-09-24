<?php

namespace App\Http\Controllers\Backend;
use App\Models\Vodka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VodkaController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function vodkaCreate(Request $request)
    {
        return view('backend.sunny.products.vodka.vodka-create');

    }

    public function vodkaList()
    {
        $data['vodkaListIndex'] = 1;
        $data['vodkaListData'] = Vodka::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.sunny.products.vodka.vodka-list', $data);
    }



    public function vodkaStore(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
                'vodka_photo' => 'required',
                'about' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required' => 'Description Is Required.',
                'about.required' => 'Photo Is Required.',
                'vodka_photo.required' => 'Photo Is Required.',


            ]


        );

        try {

            $vodka = new Vodka();
            $vodka->name = $request->input('name');
            $vodka->about = $request->input('about');
            $vodka->vodka_photo = $request->input('vodka_photo');
            $vodka->description = $request->input('description');
            // $vodka->added_by_user_id = $this->authUserId;

            if ($request->hasFile('vodka_photo')) {
                $file = $request->file('vodka_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/vodka-photos/';
                $file->move($path, $filename);
                $vodka->vodka_photo = $filename;
            }

            $vodka->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.vodkaList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editVodkaDetail(Request $request, $vodka)
    {

        $data['vodkaEditDetail'] = Vodka::select('*')->where('id', $vodka)->first();
        return view('backend.distillary.products.vodka.vodka-edit', $data);

        //
    }

    public function updateVodkaDetail($Id, Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'designation' => 'required',
                'description' => 'required',
                //  'photo' => 'required',



            ],
            [

                'name.required' => 'name Is Required.',
                'designation.required' => 'Designation Is Required.',
                'description.required'=>'Description Is Required.'



            ]


        );

        try {

            $vodka = Vodka::findOrFail($Id);
            $vodka->name = $request->input('name');
            $vodka->about = $request->input('about');
            $vodka->vodka_photo = $request->input('vodka_photo');
            $vodka->description = $request->input('description');
            // $vodka->updated_by_user_id = $this->authUserId;


            if($request->hasFile('vodka_photo')){
                $file = $request->file('vodka_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/vodka-photos/';
                $file->move($path, $filename);
                $vodka->vodka_photo = $filename;
            }



            $vodka->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.vodkaList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteVodka($id)
    {
        $deleteVodka = Vodka::find($id)->delete();
        if ($deleteVodka) {
            return redirect()->route('backend.vodkaList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }   //
}
