<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blacklist');
        $this->middleware('admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Tournament::orderby('id','desc')->paginate(20);
        return view('layouts.admin.tournament.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Game::where('status','active')->get();
        return view('layouts.admin.tournament.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validateRequest();

        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('tournament', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $data['location'] =  $fullpathurl;

            $enddate = Carbon::parse($data['enddate']);
            $data['enddate'] =  $enddate;

            Tournament::create($data);

            return back()->with('success', 'Data Save');

        }

        else
        {
            return back()->with('fail', 'Error in Data Saving');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
        $data = $tournament;
        $gamedata = Game::where('status','active')->get();
        return view('layouts.admin.tournament.edit',compact('gamedata','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //


        $data = $this->validateRequest();

        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('tournament', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $data['location'] =  $fullpathurl;

            $enddate = Carbon::parse($data['enddate']);
            $data['enddate'] =  $enddate;
            $data['updateby'] =  Auth::user()->id;

            $tournament->update($data);
            return redirect()->route('tournament.index')->with('update', 'Data Update');

        }

        else
        {
            $enddate = Carbon::parse($data['enddate']);
            $data['enddate'] =  $enddate;
            $tournament->update($data);
            return redirect()->route('tournament.index')->with('update', 'Data Update');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }

    private function validateRequest()
    {


        if (request()->hasFile('location')) {


            $data = request()->validate([
                'tournament_name' => 'required',
                'game_id' => 'required',
                'user_id' => 'required',
                'serial' => 'required',
                'total' => 'required',
                'enddate' => 'required',
                'status' => 'required|min:3',
                'location' => 'max:2048|dimensions:max_width=1922,max_height=1082',
            ]);
        } else {
            $data = request()->validate([
                'tournament_name' => 'required',
                'game_id' => 'required',
                'user_id' => 'required',
                'serial' => 'required',
                'total' => 'required',
                'enddate' => 'required',
                'status' => 'required|min:3',
                'location' => '',
            ]);
        }



        return $data;
    }

    public function disablelist()
    {
        //
        $data = Tournament::orderby('id','desc')->paginate(20);
        return view('layouts.admin.tournament.disablelist',compact('data'));
    }

    public function action(Tournament $tournament,$field,$action)
    {
        if($field == "status")
        {
            $data['status'] = $action;
            $tournament->update($data);
            return back()->with('update', 'Data Update');
        }

        if($field == "pin")
        {
            $data['pin'] = $action;
            $tournament->update($data);
            return back()->with('update', 'Data Update');
        }

        if($field == "registration")
        {
            $data['registration'] = $action;
            $tournament->update($data);
            return back()->with('update', 'Data Update');
        }
    }

    public function tournamentbygame()
    {
        $data = Game::all();
        return view('layouts.admin.tournament.gametment',compact('data'));
    }

    public function tournamentlist($gameid)
    {
        $data = Tournament::where('game_id',$gameid)->paginate(20);
        return view('layouts.admin.tournament.list',compact('data'));
    }


}
