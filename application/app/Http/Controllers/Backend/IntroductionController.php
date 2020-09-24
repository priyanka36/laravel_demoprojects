<?php

namespace App\Http\Controllers\Backend;
use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IntroductionController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function introductionCreate(Request $request)
    {
        return view('backend.distillary.about.introduction.introduction-create');

    }

    public function introductionList()
    {
        $data['introductionListIndex'] = 1;
        $data['introductionListData'] = Introduction::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.about.introduction.introduction-list', $data);
    }



    public function introductionStore(Request $request)
    {
        $request->validate(
            [

                'title' => 'required',
                'description' => 'required',
                'intro_photo' => 'required',
                'img_description' => 'required',


            ],
            [

                'title.required' => 'Title Is Required.',
                'description.required' => 'Description Is Required.',
                'intro_photo.required' => 'Photo Is Required.',
                'img_description' => ' image description Is Required.',


            ]


        );

        try {

            $introduction = new Introduction();
            $introduction->title = $request->input('title');
            $introduction->intro_photo = $request->input('intro_photo');
            $introduction->description = $request->input('description');
            $introduction->img_description = $request->input('img_description');
            $introduction->added_by_user_id = $this->authUserId;

            if ($request->hasFile('intro_photo')) {
                $file = $request->file('intro_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/introduction-photos/';
                $file->move($path, $filename);
                $introduction->intro_photo = $filename;
            }

            $introduction->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.introductionList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editIntroductionDetail(Request $request, $introduction)
    {

        $data['introductionEditDetail'] = Introduction::select('*')->where('id', $introduction)->first();
        return view('backend.distillary.about.introduction.introduction-edit', $data);

        //
    }

    public function updateIntroductionDetail(Request $request, $Id)
    {

        $request->validate(
            [

                'title' => 'required',
                'description' => 'required',
                'img_description' => ' required',
                //  'photo' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'description.required'=>'Description Is Required.',
                'img_description' => ' image description Is Required.',



            ]


        );

        try {

            $introduction = Introduction::findOrFail($Id);
            $introduction->title = $request->input('title');
            $introduction->intro_photo = $request->input('intro_photo');
            $introduction->description = $request->input('description');
            $introduction->img_description = $request->input('img_description');
            $introduction->updated_by_user_id = $this->authUserId;


            if($request->hasFile('intro_photo')){
                $file = $request->file('intro_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/introduction-photos/';
                $file->move($path, $filename);
                $introduction->intro_photo = $filename;
            }



            $introduction->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.introductionList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteIntroduction($id)
    {

        $deleteIntroduction = Introduction::find($id)->delete();
        if ($deleteIntroduction) {
            return redirect()->route('backend.introductionList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
