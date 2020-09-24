<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class BodController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function bodCreate(Request $request)
    {
        return view('backend.distillary.about.bod.bod-create');

    }

    public function bodList()
    {
        $data['bodListIndex'] = 1;
        $data['bodListData'] = Bod::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.about.bod.bod-list', $data);
    }



    public function bodStore(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'designation' => 'required',
                'description' => 'required',
                'bodmember_photo' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'designation.required' => 'Title Is Required.',
                'description.required' => 'Description Is Required.',
                'bodmember_photo.required' => 'Photo Is Required.'


            ]


        );

        try {

            $bod = new Bod();
            $bod->name = $request->input('name');
            $bod->designation = $request->input('designation');
            $bod->bodmember_photo = $request->input('bodmember_photo');
            $bod->description = $request->input('description');
            // $bod->added_by_user_id = $this->authUserId;

            if ($request->hasFile('bodmember_photo')) {
                $file = $request->file('bodmember_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/bod-photos/';
                $file->move($path, $filename);
                $bod->bodmember_photo = $filename;
            }

            $bod->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.bodList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editBodDetail(Request $request, $bod)
    {

        $data['bodEditDetail'] = Bod::select('*')->where('id', $bod)->first();
        return view('backend.distillary.about.bod.bod-edit', $data);

        //
    }

    public function updateBodDetail($Id, Request $request)
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

            $bod = Bod::findOrFail($Id);
            $bod->name = $request->input('name');
            $bod->designation= $request->input('designation');
            $bod->bodmember_photo = $request->input('bodmember_photo');
            $bod->description = $request->input('description');
           // $bod->updated_by_user_id = $this->authUserId;


            if($request->hasFile('bodmember_photo')){
                $file = $request->file('bodmember_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/bod-photos/';
                $file->move($path, $filename);
                $bod->bodmember_photo = $filename;
            }



            $bod->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.bodList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteBod($id)
    {
        $deleteBod = Bod::find($id)->delete();
        if ($deleteBod) {
            return redirect()->route('backend.bodList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
