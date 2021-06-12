<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Pubg;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blacklist');
        $this->middleware('subadmin');

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
        $user = new User();
        $tournamet = new Tournament();
        $game = new Game();
        return view('layouts.admin.home',compact('game','tournamet','user'));
    }

    public function tournamentsetting(Tournament $tournament)
    {

        return view('layouts.admin.tournament.setting',compact('tournament'));
    }

    public function usercreate()
    {
        return view('layouts.admin.user.create');
    }

    public function addusertype(Request $request)
    {

            $data = $this->regValidate();

            $data['password'] = Hash::make($request->password);

            $data['status'] = "active";
            User::create($data);
            return back()->with('update', 'Registration Success Full');
    }

    public function regValidate()
    {

        $data = request()->validate([

            'name' => 'required',
            'type' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',


        ]);

     return $data;

    }

    public function getnormaluserlist()
    {
        $user = User::where('type','normal')->paginate(20);
        $heading = "NORMAL USER LIST";
        return view('layouts.admin.user.list',compact('user','heading'));

    }

    public function getadminlist()
    {
        $user = User::where('type','admin')->paginate(20);
        $heading = "ADMIN USER LIST";
        return view('layouts.admin.user.list',compact('user','heading'));

    }

    public function getadminblacklist()
    {
        $user = User::where('type','admin')->paginate(20);
        $heading = "ADMIN USER BLACKLIST";
        return view('layouts.admin.user.disablelist',compact('user','heading'));

    }

    public function getsubadminlist()
    {
        $user = User::where('type','subadmin')->paginate(20);
        $heading = "SUBADMIN USER LIST";
        return view('layouts.admin.user.list',compact('user','heading'));

    }

    public function getnormaluserblacklist()
    {
        $user = User::where('type','normal')->paginate(20);
        $heading = "NORMAL USER BLACKLIST";
        return view('layouts.admin.user.disablelist',compact('user','heading'));

    }

    public function getsubadminblacklist()
    {
        $user = User::where('type','subadmin')->paginate(20);
        $heading = "SUBADMIN USER BLACKLIST";
        return view('layouts.admin.user.disablelist',compact('user','heading'));

    }

    public function getnormaluserdisablelist()
    {
        $user = User::where('type','normal')->paginate(20);
        $heading = "NORMAL USER LIST";
        return view('layouts.admin.user.list',compact('user','heading'));

    }


    public function blacklistuser(User $user)
    {

        $user->status = "blacklist" ;
        $user->save();
        return back()->with('warning','One User Blacklist');

    }

    public function activeuser(User $user)
    {

        $user->status = "active" ;
        $user->save();
        return back()->with('success','One User Active');

    }

    public function loadrestpass(User $user)
    {

        return view('layouts.admin.user.resetpass',compact('user'));

    }

    public function passresetconfirm( Request $request ,User $user)

    {

        $data = $this->validateRequestpassword();
        $data['password'] = Hash::make($request->password);
        $user->update($data);
        return back()->with('update', 'Data Update');

    }


    public function validateRequestpassword()
    {

        $data = request()->validate([

            'password' => 'required|min:8|confirmed',

        ]);

        return $data;

    }


    public function teamlist($tournamentid)
    {
        $data = Team::where('tournament_id',$tournamentid)->paginate(30);
        $tournament = Tournament::find($tournamentid);

        if($tournament->game->id == 1)
        {
            return view('layouts.admin.team.list',compact('data','tournament'));
        }

    }


    public function editall(Team $team)
    {

        if ((Auth::user()->type =="admin") || (Auth::user()->type =="superadmin")) {

            if($team->tournament->game_id == 1)
            {
                $data = $team;
                return redirect()->route('pubg.edit',$team);
            }
        }

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


    public function teamdestroy(Team $team)
    {
        //
        if($team->tournament->game->id == 1)
        {
            if($team->pubgs->count() > 0)
            {

                    Pubg::where('team_id',$team->id)->delete();
                    $team->delete();
                    return back()->with('fail','Data delete success full');
            }
            else
            {
                $team->delete();
                return back()->with('fail','Data delete success full');
            }

        }

    }

}
