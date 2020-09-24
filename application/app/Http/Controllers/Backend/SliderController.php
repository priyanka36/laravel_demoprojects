<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }


    public function sliderList()
    {
        $data['sliderListIndex'] = 1;
        $data['sliderListData'] = Slider::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.slider.slider-list', $data);
    }

    public function sliderCreate(Request $request)
    {
        return view('backend.slider.slider-create');

    }
    public function sliderStore(Request $request)
    {
        $request->validate(
            [

                'title' => 'required',
                'photo' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'photo.required'=>'Photo Is Required.'



            ]


        );

        try {

            $slider = new Slider();
            $slider->title = $request->input('title');
            $slider->added_by_user_id = $this->authUserId;

            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/slider-photos/';
                $file->move($path, $filename);
                $slider->photo = $filename;
            }

            $slider->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.sliderList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);


    }
    public function editSliderDetail(Request $request, $slider)
    {

        $data['sliderEditDetail'] = Slider::select('*')->where('id', $slider)->first();
        return view('backend.slider.slider-edit', $data);
            dd($data);
        //
    }

    public function updateSliderDetail($Id, Request $request)
    {

        $request->validate(
            [

                'title' => 'required',
              //  'photo' => 'required',



            ],
            [

                'title.required' => 'Title Is Required.',
                'photo.required'=>'Photo Is Required.'



            ]


        );

        try {

            $slider = Slider::findOrFail($Id);
            $slider->title = $request->input('title');
            $slider->updated_by_user_id = $this->authUserId;


            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/slider-photos/';
                $file->move($path, $filename);
                $slider->photo = $filename;
            }



            $slider->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.sliderList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);


    }




    public function deleteSlider($id)
    {
        $deleteSlider = Slider::find($id)->delete();
        if ($deleteSlider) {
            return redirect()->route('backend.sliderList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
