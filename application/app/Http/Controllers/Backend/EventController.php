<?php

namespace App\Http\Controllers\Backend;
use App\Models\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }
    public function eventCreate(Request $request)
    {
        return view('backend.distillary.events.event-create');

    }

    public function eventList()
    {
        $data['eventListIndex'] = 1;
        $data['eventListData'] = Event::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.events.event-list', $data);
    }



    public function eventStore(Request $request)
    {
//        dd($request->all());
        $request->validate(
            [

                'eventname' => 'required',
                'address' => 'required',
                'description' => 'required',
                'date' => 'required',
                'bg_photo' => 'required',
                'photo' => 'required',



            ],
            [

                'eventname.required' => 'NameIs Required.',
                'address.required' => 'Address Is Required.',
                'description.required' => 'Description Is Required.',
                'date.required' => 'Date Is Required.',
                'bg_photo.required' => 'Background Photo Is Required.',
                'photo.required' => 'Photo Is Required.'



            ]


        );

        try {
            $event = new Event();
            $event->eventname = $request->input('eventname');
            $event->address = $request->input('address');
            $event->description= $request->input('description');
            $event->date= $request->input('date');
            $event->bg_photo = $request->input('bg_photo');
            $event->photo = $request->input('photo');


            $event->added_by_user_id = $this->authUserId;

            if($request->hasFile('bg_photo')){
                $file = $request->file('bg_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/event-photos/';
                $file->move($path, $filename);
                $event->bg_photo = $filename;
            }
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/event-photos/';
                $file->move($path, $filename);
                $event->photo = $filename;
            }




            $event->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.eventList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editEventDetail(Request $request, $event)
    {

        $data['eventEditDetail'] = Event::select('*')->where('id', $event)->first();
        return view('backend.distillary.events.event-edit', $data);

        //
    }

    public function updateEventDetail($Id, Request $request)
    {

        $request->validate(
            [

                'eventname' => 'required',
                'address' => 'required',
                'description' => 'required',
                'date' => 'required',
               // 'bg_photo' => 'required',
                //'photo' => 'required',



            ],
            [

                'eventname.required' => 'NameIs Required.',
                'address.required' => 'Address Is Required.',
                'description.required' => 'Description Is Required.',
                'date.required' => 'Date Is Required.',
                //'bg_photo.required' => 'Background Photo Is Required.',
                //'photo.required' => 'Photo Is Required.'




            ]


        );

        try {

            $event = Event::findOrFail($Id);
            $event->eventname = $request->input('eventname');
            $event->address = $request->input('address');
            $event->description= $request->input('description');
            $event->date= $request->input('date');
            $event->bg_photo = $request->input('bg_photo');
            $event->photo = $request->input('photo');
            $event->updated_by_user_id = $this->authUserId;


            if($request->hasFile('bg_photo')){
                $file = $request->file('bg_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/event-photos/';
                $file->move($path, $filename);
                $event->bg_photo = $filename;
            }
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/event-photos/';
                $file->move($path, $filename);
                $event->photo = $filename;
            }




            $event->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.eventList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteEvent($id)
    {
        $deleteEvent = Event::find($id)->delete();
        if ($deleteEvent) {
            return redirect()->route('backend.eventList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
