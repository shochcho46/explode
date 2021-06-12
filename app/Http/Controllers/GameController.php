<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GameController extends Controller
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
        $data = Game::all();
        return view('layouts.admin.game.list',compact('data'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.admin.game.create');
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
            $path = $images->storeAs('game', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $data['location'] =  $fullpathurl;

            Game::create($data);

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
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        $data = $game;
        return view('layouts.admin.game.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
        $data = $this->validateRequest();

        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('game', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $data['location'] =  $fullpathurl;

            $game->update($data);
            return redirect()->route('game.index')->with('update', 'Data Update');

        }

        else{

            $game->update($data);
            return redirect()->route('game.index')->with('update', 'Data Update');

        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        if($game->tournaments()->count())
        {
            return back()->with('fail', 'This Game can not be deleted . You can disable it ');
        }
        $game->delete();
        return back()->with('success', 'Data Deleted');
    }

    public function disable(Request $request, Game $game)
    {

        $game->status = "disable" ;
        $game->save();
        return back()->with('warning','One Game Disable');
    }

    public function active(Request $request, Game $game)
    {

        $game->status = "active";
        $game->save();
        return back()->with('update','One Game Active');
    }


    public function disablelist()
    {
        //
        $data = Game::all();
        return view('layouts.admin.game.disablelist',compact('data'));
    }

    public function gametournament(Game $game)
    {
        //
        $data = Game::all();
        return view('layouts.admin.game.disablelist',compact('data'));
    }



    private function validateRequest()
    {


        if (request()->hasFile('location')) {

            $data = request()->validate([
                'game_name' => 'required',
                'serial' => 'required',
                'status' => 'required|min:3',
                'location' => 'max:2048|dimensions:max_width=1922,max_height=1082',
            ]);
        } else {
            $data = request()->validate([
                'game_name' => 'required',
                'serial' => 'required',
                'status' => 'required|min:3',
                'location' => '',
            ]);
        }



        return $data;
    }




}
