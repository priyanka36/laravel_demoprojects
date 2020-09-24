<?php

namespace App\Http\Controllers\Backend;
use App\Models\Gin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GinController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function ginCreate(Request $request)
    {
        return view('backend.distillary.products.gin.gin-create');

    }

    public function ginList()
    {
        $data['ginListIndex'] = 1;
        $data['ginListData'] = Gin::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.products.gin.gin-list', $data);
    }



    public function ginStore(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [

                'name' => 'required',
                'description' => 'required',
                'gin_photo' => 'required',
                'about' => 'required',


            ],
            [

                'name.required' => 'Name Is Required.',
                'description.required' => 'Description Is Required.',
                'about.required' => 'About Is Required.',
                'gin_photo.required' => 'Photo Is Required.',


            ]


        );

        try {

            $gin = new Gin();
            $gin->name = $request->input('name');
            $gin->about = $request->input('about');
            $gin->gin_photo = $request->input('gin_photo');
            $gin->description = $request->input('description');
            // $gin->added_by_user_id = $this->authUserId;

            if ($request->hasFile('gin_photo')) {
                $file = $request->file('gin_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/gin-photos/';
                $file->move($path, $filename);
                $gin->gin_photo = $filename;
            }

            $gin->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.ginList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editGinDetail(Request $request, $gin)
    {

        $data['ginEditDetail'] = Gin::select('*')->where('id', $gin)->first();
        return view('backend.distillary.products.gin.gin-edit', $data);

        //
    }

    public function updateGinDetail($Id, Request $request)
    {
        dd($request);
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

            $gin = Gin::findOrFail($Id);
            $gin->name = $request->input('name');
            $gin->about = $request->input('about');
            $gin->gin_photo = $request->input('gin_photo');
            $gin->description = $request->input('description');
            // $gin->updated_by_user_id = $this->authUserId;


            if($request->hasFile('gin_photo')){
                $file = $request->file('gin_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/gin-photos/';
                $file->move($path, $filename);
                $gin->gin_photo = $filename;
            }



            $gin->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.ginList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteGin($id)
    {
        $deleteGin = Gin::find($id)->delete();
        if ($deleteGin) {
            return redirect()->route('backend.ginList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
