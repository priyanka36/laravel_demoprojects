<?php

namespace App\Http\Controllers\Backend;

use App\Models\Enroll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class EnrollController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function enrollCreate(Request $request)
    {
        return view('backend.distillary.career.enroll.enroll-create');

    }

    public function enrollList()
    {
        $data['enrollListIndex'] = 1;
        $data['enrollListData'] = Enroll::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.career.enroll.enroll-list', $data);
    }



    public function enrollStore(Request $request)
    {
//        dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'designation' => 'required',
                'cv' => 'required',
                'message' => 'required',



            ],
            [

                'name.required' => 'Name Is Required.',
                'address.required' => 'Address Is Required.',
                'email.required' => 'Email Is Required.',
                'phone.required' => 'Phone Is Required.',
                'designation.required' => 'Designation Is Required.',
                'cv.required' => 'Cv Is Required.',
                'message.required' => 'Message Is Required.',


            ]


        );

        try {

            $enroll = new Enroll();
            $enroll->name = $request->input('name');
            $enroll->address = $request->input('address');
            $enroll->email = $request->input('email');
            $enroll->phone = $request->input('phone');
            $enroll->designation = $request->input('designation');
            $enroll->cv = $request->input('cv');
            $enroll->message= $request->input('message');


            if($request->hasFile('cv')){
                $file = $request->file('cv');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/enroll-cv/';
                $file->move($path, $filename);
                $enroll->cv = $filename;
            }


            $enroll->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.enrollList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editEnrollDetail(Request $request, $enroll)
    {

        $data['enrollEditDetail'] = Enroll::select('*')->where('id', $enroll)->first();
        return view('backend.distillary.career.enroll.enroll-edit', $data);

        //
    }

    public function updateEnrollDetail($Id, Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'designation' => 'required',
                'cv' => 'required',
                'message' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'address.required' => 'Address Is Required.',
                'email.required' => 'Email Is Required.',
                'phone.required' => 'Phone Is Required.',
                'designation.required' => 'Designation Is Required.',
                'cv.required' => 'Cv Is Required.',
                'message.required' => 'Message Is Required.',




            ]


        );

        try {

            $enroll = new Enroll();
            $enroll->name = $request->input('name');
            $enroll->address = $request->input('address');
            $enroll->email = $request->input('email');
            $enroll->phone = $request->input('phone');
            $enroll->designation = $request->input('designation');
            $enroll->cv = $request->input('cv');
            $enroll->message= $request->input('message');

            if($request->hasFile('cv')){
                $file = $request->file('cv');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/enroll-cv/';
                $file->move($path, $filename);
                $enroll->cv = $filename;
            }




            $enroll->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.enrollList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteEnroll($id)
    {
        $deleteEnroll = Enroll::find($id)->delete();
        if ($deleteEnroll) {
            return redirect()->route('backend.enrollList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
