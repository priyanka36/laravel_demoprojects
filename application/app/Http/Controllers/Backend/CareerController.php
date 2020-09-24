<?php

namespace App\Http\Controllers\Backend;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function careerCreate(Request $request)
    {
        return view('backend.distillary.career.career-create');

    }

    public function careerList()
    {
        $data['careerListIndex'] = 1;
        $data['careerListData'] = Career::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.career.career-list', $data);
    }



    public function careerStore(Request $request)
    {
//       dd($request->all());
        $request->validate(
            [

                'title' => 'required',
                'location' => 'required',
                'description' => 'required',
                'skills' => 'required',
                'requirement' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'location.required' => 'Location Is Required.',
                'description.required' => 'Description Is Required.',
                'skills.required' => 'Skills Is Required.',
                'requirement.required' => 'Requirements Is Required.'


            ]


        );

        try {

            $career = new Career();
            $career->title = $request->input('title');
            $career->location = $request->input('location');
            $career->description = $request->input('description');
            $career->skills = $request->input('skills');
            $career->requirement = $request->input('requirement');


             //$career->added_by_user_id = $this->authUserId;


            $career->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.careerList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editCareerDetail(Request $request, $career)
    {

        $data['careerEditDetail'] = Career::select('*')->where('id', $career)->first();
        return view('backend.distillary.career.career-edit', $data);

        //
    }

    public function updateCareerDetail($Id, Request $request)
    {

        $request->validate(
            [

                'title' => 'required',
                'location' => 'required',
                'description' => 'required',
                'skills' => 'required',
                'requirement' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'location.required' => 'Location Is Required.',
                'description.required' => 'Description Is Required.',
                'skills.required' => 'Skills Is Required.',
                'requirement.required' => 'Requirements Is Required.'




            ]


        );

        try {

            $career = Career::findOrFail($Id);
            $career->title = $request->input('title');
            $career->location = $request->input('location');
            $career->description= $request->input('description');
            $career->skills= $request->input('skills');
            $career->requirement = $request->input('requirement');
           // $career->updated_by_user_id = $this->authUserId;






            $career->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.careerList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteCareer($id)
    {
        $deleteCareer = Career::find($id)->delete();
        if ($deleteCareer) {
            return redirect()->route('backend.careerList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
