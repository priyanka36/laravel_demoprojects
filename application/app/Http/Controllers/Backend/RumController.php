<?php

namespace App\Http\Controllers\Backend;
use App\Models\Rum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class RumController extends Controller
{

    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function rumCreate(Request $request)
    {
        return view('backend.distillary.products.rum.rum-create');

    }

    public function rumList()
    {
        $data['rumListIndex'] = 1;
        $data['rumListData'] = Rum::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.products.rum.rum-list', $data);
    }



    public function rumStore(Request $request)
    {
       // dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
                'rum_photo' => 'required',
                'about' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required' => 'Description Is Required.',
                'about.required' => 'Photo Is Required.',
                'rum_photo.required' => 'Photo Is Required.',


            ]


        );

        try {

            $rum = new Rum();
            $rum->name = $request->input('name');
            $rum->about = $request->input('about');
            $rum->rum_photo = $request->input('rum_photo');
            $rum->description = $request->input('description');
            // $rum->added_by_user_id = $this->authUserId;

            if ($request->hasFile('rum_photo')) {
                $file = $request->file('rum_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/rum-photos/';
                $file->move($path, $filename);
                $rum->rum_photo = $filename;
            }

            $rum->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.rumList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editRumDetail(Request $request, $rum)
    {

        $data['rumEditDetail'] = Rum::select('*')->where('id', $rum)->first();
        return view('backend.distillary.products.rum.rum-edit', $data);

        //
    }

    public function updateRumDetail($Id, Request $request)
    {


        try {

            $rum = Rum::findOrFail($Id);
            $rum->name = $request->input('name');
            $rum->about = $request->input('about');
            $rum->rum_photo = $request->input('rum_photo');
            $rum->description = $request->input('description');
            // $rum->updated_by_user_id = $this->authUserId;


            if($request->hasFile('rum_photo')){
                $file = $request->file('rum_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/rum-photos/';
                $file->move($path, $filename);
                $rum->rum_photo = $filename;
            }

//dd($rum);

            $rum->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.rumList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteRum($id)
    {
        $deleteRum = Rum::find($id)->delete();
        if ($deleteRum) {
            return redirect()->route('backend.rumList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
