<?php

namespace App\Http\Controllers\Backend;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    private $authUserId;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->authUserId = Auth::user()->id;

            return $next($request);
        });
    }


    public function index()
    {

        $data['teamListIndex'] = 1;
        $data['teamListData'] = Team::select('*')->orderBy('created_at', 'ASC')->get();
        return view('backend.distillary.about.teammember.team-list', $data);
    }

    public function teamCreate(Request $request)
    {
        return view('backend.distillary.about.teammember.team-create');

    }



    public function teamStore(Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'designation' => 'required',
                'member_photo' => 'required',
                'description' => 'required',


            ],
            [

                'name.required' => 'Title Is Required.',
                'designation.required' => 'Designation Is Required.',
                'member_photo.required' => 'Photo Is Required.',
                'description' => 'Description Is Required.',


            ]


        );

        try {

            $team = new Team();
            $team->name = $request->input('name');
            $team->designation = $request->input('designation');
            $team->member_photo = $request->input('member_photo');
            $team->description = $request->input('description');
            // $team->added_by_user_id = $this->authUserId;

            if ($request->hasFile('member_photo')) {
                $file = $request->file('member_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/team-photos/';
                $file->move($path, $filename);
                $team->member_photo = $filename;
            }

            $team->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.teamList')->with(['message' => 'Data Inserted Successfully ', 'alert-type' => 'success']);

    }
    public function editTeamDetail(Request $request, $team)
    {

        $data['teamEditDetail'] = Team::select('*')->where('id', $team)->first();
        return view('backend.distillary.about.teammember.team-edit', $data);

    }

    public function updateTeamDetail($Id, Request $request)
    {

        $request->validate(
            [

                'name' => 'required',
                'designation' => 'required',
                //'member_photo' => 'required',
                'description' => 'required',



            ],
            [

                'name.required' => 'Title Is Required.',
                'designation.required' => 'Description Is Required.',
                //'member_photo.required' => 'Photo Is Required.',
                'description' => 'Description Is Required.',




            ]


        );

        try {

            $team = Team::findOrFail($Id);
            $team->name = $request->input('name');
            $team->designation = $request->input('designation');
            $team->member_photo = $request->input('member_photo');
            $team->description = $request->input('description');
           // $team->updated_by_user_id = $this->authUserId;


            if($request->hasFile('member_photo')){
                $file = $request->file('member_photo');
                $filename = $file->getClientOriginalName();
                $path = 'uploads/team-photos/';
                $file->move($path, $filename);
                $team->member_photo = $filename;
            }



            $team->save();

        } catch (QueryException $e) {

        }
        return redirect()->route('backend.teamList')->with(['message' => 'Data Updated Successfully ', 'alert-type' => 'success']);


    }




    public function deleteTeam($id)
    {
        $deleteTeam = Team::find($id)->delete();
        if ($deleteTeam) {
            return redirect()->route('backend.teamList')->with(['message' => 'Data Deleted Successfully ', 'alert-type' => 'success']);

        }
    }
}
