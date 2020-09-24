<?php

namespace App\Http\Controllers\Backend;

use App\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function homepageCreate(Request $request)
    {
        return view('backend.distillary.homepage.homepage-create');

    }

    public function homepageList()
    {
        $data['homepageListIndex'] = 1;
        $data['homepageListData'] = Homepage::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.homepage.homepage-list', $data);
    }



    public function homepageStore(Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
                'bg_photo' => 'required',
              //  'img_description' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required' => 'Description Is Required.',
                'bg_photo.required' => 'Photo Is Required.',
               // 'img_description.required' => 'description Is Required.'


            ]


        );

        try {

            $homepage = new Homepage();
            $homepage->name = $request->input('name');
            $homepage->bg_photo = $request->input('bg_photo');
            $homepage->description = $request->input('description');
            $homepage->active_status = $request->input('active_status');
            //$homepage->img_description= $request->input('img_description');
            $homepage->added_by_user_id = $this->authUserId;

            if ($request->hasFile('bg_photo')) {
                $file = $request->file('bg_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/homepage-photos/';
                $file->move($path, $filename);
                $homepage->bg_photo = $filename;
            }

            $homepage->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.homepageList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editHomepageDetail(Request $request, $homepage)
    {

        $data['homepageEditDetail'] = Homepage::select('*')->where('id', $homepage)->first();
        return view('backend.distillary.homepage.homepage-edit', $data);

        //
    }

    public function updateHomepageDetail($Id, Request $request)
    {


        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
               // 'img_description' => 'required',



            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required'=>'Description Is Required.',
               // 'img_description' => 'Image Description Is required',



            ]


        );

        try {

            $homepage = Homepage::findOrFail($Id);
            $homepage->name = $request->input('name');
          //  $homepage->bg_photo = $request->input('bg_photo');
            $homepage->description = $request->input('description');
           // $homepage->img_description = $request->input('img_description');
          //  $homepage->updated_by_user_id = $this->authUserId;


            if($request->hasFile('bg_photo')){
                $file = $request->file('bg_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/homepage-photos/';
                $file->move($path, $filename);
                $homepage->bg_photo = $filename;
            }



            $homepage->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.homepageList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteHomepage($id)
    {
        $deleteHomepage = Homepage::find($id)->delete();
        if ($deleteHomepage) {
            return redirect()->route('backend.homepageList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
