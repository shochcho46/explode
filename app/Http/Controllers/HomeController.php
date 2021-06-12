<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
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

        return view('layouts.normal.home',compact('data'));
    }

    public function signup()
    {

        return view('layouts.common.auth.signup');
    }

    public function gameload()
    {
        $data = Game::where('status','active')->get();
        return view('layouts.normal.page.game',compact('data'));
    }

    public function aboutload()
    {
        return view('layouts.normal.page.about');
    }

    public function document()
    {
        return view('layouts.normal.page.document');
    }

    public function tournament()
    {
        $data = Tournament::where('status','active')->orderby('serial','asc')->get();
        return view('layouts.normal.page.tournament',compact('data'));
    }


    public function tournamentlist($gameid)
    {
        $data = Tournament::where('game_id',$gameid)->where('status','active')->get();
        return view('layouts.normal.page.tournament',compact('data'));
    }



    public function login()
    {
        return view('layouts.common.auth.login');
    }

    public function register(Request $request)
    {
            $data = $this->regValidate();
            $data['password'] = Hash::make($request->password);
            $data['type'] = "normal";

            User::create($data);
            return back()->with('update', 'Registration Success Full');
    }


    public function signin(Request $request)

    {
        $data = $this->loginValidate();

    }

    public function regValidate()
    {

        $data = request()->validate([

            'name' => 'required',
            'type' => '',
            'mobile' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',


        ]);

        return $data;

    }

    public function loginValidate()
    {

        $data = request()->validate([

            'emailormobile' => 'required',
            'password' => 'required|min:8',


        ]);

        return $data;

    }
}
