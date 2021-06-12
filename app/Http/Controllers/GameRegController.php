<?php

namespace App\Http\Controllers;

use App\Models\Pubg;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class GameRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



    public function tournamentdetail(Tournament $tournament)
    {


        if (($tournament->status == "active")) {

            if($tournament->game_id == 1)
            {

                return redirect()->route('pubg.details',$tournament->id);


            }

            else
            {
                return back()->with('fail','Sorry No Details found');
            }

        }
        else
        {
            return back()->with('fail','Sorry No Details found');
        }

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
