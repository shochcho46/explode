<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Tournament;
use Illuminate\Http\Request;

class RuleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('blacklist');
        // $this->middleware('admin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tournament)
    {
        //
        return view('layouts.admin.rule.create',compact('tournament'));
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
        $data = $this->validateRequest();
        Rule::create($data);
        return redirect()->route('admin.tournamentsetting',$data['tournament_id'])->with('success', 'Rule Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
        return view('layouts.admin.rule.edit',compact('rule'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        //
        $data = $this->validateRequest();
        $rule->update($data);
        return redirect()->route('admin.tournamentsetting',$rule->tournament_id)->with('update', 'Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
    }

    public function loadrule(Tournament $tournament)
    {
        $rule = Rule::where('tournament_id', $tournament->id)->first();

        if (empty($rule))
        {
            return redirect()->route('rule.create',$tournament->id);
        }

        else
        {

            return redirect()->route('rule.edit',compact('rule'));
        }


    }


    private function validateRequest()
    {


            $data = request()->validate([
                'tournament_id' => 'required',
                'description' => 'required',

            ]);




        return $data;
    }
}
