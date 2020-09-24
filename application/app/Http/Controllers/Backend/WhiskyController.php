<?php

namespace App\Http\Controllers\Backend;
use App\Models\Whisky;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WhiskyController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function whiskyCreate(Request $request)
    {
        return view('backend.distillary.products.whisky.whisky-create');

    }

    public function whiskyList()
    {
        $data['whiskyListIndex'] = 1;
        $data['whiskyListData'] = Whisky::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.products.whisky.whisky-list', $data);
    }



    public function whiskyStore(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
                'whisky_photo' => 'required',
                'about' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required' => 'Description Is Required.',
                'about.required' => 'Photo Is Required.',
                'whisky_photo.required' => 'Photo Is Required.',


            ]


        );

        try {

            $whisky = new Whisky();
            $whisky->name = $request->input('name');
            $whisky->about = $request->input('about');
            $whisky->whisky_photo = $request->input('whisky_photo');
            $whisky->description = $request->input('description');
            // $whisky->added_by_user_id = $this->authUserId;

            if ($request->hasFile('whisky_photo')) {
                $file = $request->file('whisky_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/whisky-photos/';
                $file->move($path, $filename);
                $whisky->whisky_photo = $filename;
            }

            $whisky->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.whiskyList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editWhiskyDetail(Request $request, $whisky)
    {

        $data['whiskyEditDetail'] = Whisky::select('*')->where('id', $whisky)->first();
        return view('backend.distillary.products.whisky.whisky-edit', $data);

        //
    }

    public function updateWhiskyDetail($Id, Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'about' => 'required',
                'description' => 'required',
                //  'photo' => 'required',



            ],
            [

                'name.required' => 'name Is Required.',
                'about.required' => 'About Is Required.',
                'description.required'=>'Description Is Required.'



            ]


        );

        try {

            $whisky = Whisky::findOrFail($Id);
            $whisky->name = $request->input('name');
            $whisky->about = $request->input('about');
            $whisky->whisky_photo = $request->input('whisky_photo');
            $whisky->description = $request->input('description');
            // $whisky->updated_by_user_id = $this->authUserId;


            if($request->hasFile('whisky_photo')){
                $file = $request->file('whisky_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/whisky-photos/';
                $file->move($path, $filename);
                $whisky->whisky_photo = $filename;
            }



            $whisky->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.whiskyList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteWhisky($id)
    {
        $deleteWhisky = Whisky::find($id)->delete();
        if ($deleteWhisky) {
            return redirect()->route('backend.whiskyList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }   //
}
