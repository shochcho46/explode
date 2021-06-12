<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = Game::where('status','active')->take(6)->get();
        return view('layouts.register.home',compact('data'));
    }

    public function dashboard()
    {
        $user = new User();
        $tournamet = new Tournament();
        $game = new Game();
        $data = Game::where('status','active')->take(6)->get();
        return view('layouts.register.dashboard.dashboard',compact('game','tournamet','user'));
    }


    public function regtournament()
    {
        //

        $data = Team::where('user_id',Auth::user()->id)->orderby('id','desc')->paginate(20);
        return view('layouts.register.tournament.list',compact('data'));
    }


    public function tournament()
    {

        $data = Tournament::where('status','active')->orderby('serial','asc')->get();
        return view('layouts.register.page.tournament',compact('data'));
    }



    public function tournamentlist($gameid)
    {
        $data = Tournament::where('game_id',$gameid)->where('status','active')->get();
        return view('layouts.register.page.tournament',compact('data'));
    }

    public function gameload()
    {
        $data = Game::where('status','active')->get();
        return view('layouts.register.page.game',compact('data'));
    }


    public function aboutload()
    {
        return view('layouts.register.page.about');
    }

    public function document()
    {
        return view('layouts.register.page.document');
    }


    public function editall(Team $team)
    {

        if (($team->tournament->status == "active")&&($team->tournament->registration == "active")) {


            if($team->tournament->game_id == 1)
            {
                $data = $team;
                return redirect()->route('pubg.edit',$team);
            }

        }

        else
        {
            return back()->with('fail','You can not Edit Because Registration is colse');
        }


    }



    public function updatepesonal(Request $request, User $user)

    {
        $userId = $user->id;
        $data = $this->pubgpersonal( $userId);
        $user->update($data);
        return back()->with('success','Data updated');

    }


    private function pubgpersonal($user)
    {
        $user = User::find($user);
        $data = request()->validate([
                'name' => 'required',
                'email' => [

                    Rule::unique('users')->ignore($user->id),
                ],
                'mobile' => [

                    Rule::unique('users')->ignore($user->id),
                ],

            ]);




        return $data;
    }



    public function teamupdate(Request $request, Team $team)

    {
        $data = $this->teamvalidateRequest();

        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('teamlogo', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $data['location'] =  $fullpathurl;

            $team->update($data);
            return back()->with('update', 'Data Update');

        }

        else
        {
            $team->update($data);
            return back()->with('update', 'Data Update');
        }

    }


    public function teamvalidateRequest()
    {


        if (request()->hasFile('location')) {


            $data = request()->validate([
                'team_name' => 'required',
                'rzs' => 'required',

                'location' => 'max:2048|dimensions:max_width=1922,max_height=1082',
            ]);
        } else {
            $data = request()->validate([
                'team_name' => 'required',
                'rzs' => 'required',
                'location' => '',
            ]);
        }



        return $data;
    }



    public function loadform(Tournament $tournament)
    {

        if($tournament->teams->count() >= $tournament->total)
        {
            $tournament->registration = "disable";
            $tournament->save();
            return back()->with('fail','Registration is close');
        }

        if(Carbon::now()->gt(Carbon::parse($tournament->enddate)))

        {
            $tournament->registration = "disable";
            $tournament->save();
            return back()->with('fail','Registration is close');
        }



        $filterdata = Team::where('tournament_id',$tournament->id)
                            ->where('user_id',Auth::user()->id)->get();

           if($filterdata->count() > 0)
           {
                return back()->with('fail','Your have already registered in this Tournament');
           }

        if (($tournament->status == "active")&&($tournament->registration == "active")) {

            if($tournament->game_id == 1)
            {

                return redirect()->route('pubg.form',$tournament->id);
            }

        }
        else
        {
            return back()->with('fail','Registration is close');
        }


    }

}
