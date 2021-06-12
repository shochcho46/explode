<?php

namespace App\Http\Controllers;

use App\Models\Pubg;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PubgController extends Controller
{
    //

    public function pubgformload($tournamentid)
    {
        if (Auth::check()) {

            $tournamentInstance = Tournament::find($tournamentid);
            $tName = $tournamentInstance->tournament_name;
            $tournametid = $tournamentid;
            return view('layouts.register.pubg.pubgform',compact('tournamentInstance','tName','tournametid'));
        }

        else
        {
            $tournamentInstance = Tournament::find($tournamentid);
            $tName = $tournamentInstance->tournament_name;
            $tournametid = $tournamentid;
            return view('layouts.normal.page.pubg',compact('tournamentInstance','tName','tournametid'));
        }



    }

    public function pubgdetail($tournamentid)
    {
        if (Auth::check()) {
        $getDetais = Tournament::find($tournamentid);
        $tName = $getDetais->tournament_name;
        $tournametid = $tournamentid;
        return view('layouts.register.pubg.pubgdetails',compact('tournametid','tName'));
        }

        else
        {
            $getDetais = Tournament::find($tournamentid);
        $tName = $getDetais->tournament_name;
        $tournametid = $tournamentid;
        return view('layouts.normal.page.pubgdetail',compact('tournametid','tName'));
        }


    }

    public function register(Request $request)
    {
        //

        $data = $this->validateRequest();

        $checkMobile = User::where('mobile',$data['mobile'])->get();
        $checkEmail = User::where('email',$data['email'])->get();

        if(($checkMobile->count() > 0))
        {
            return back()->with('fail','This mobile Number is already taken');
        }

        if(($checkEmail->count() > 0))
        {
            return back()->with('fail','This Email is already taken');
        }

        $password =  rand(10000000, 10000000000);

        $userdata['password']= Hash::make($password );
        $userdata['name']= $data['name'];
        $userdata['email']= $data['email'];
        $userdata['mobile']= $data['mobile'];
        $userdata['type']= "normal";



        $user = User::firstOrCreate($userdata);



        $teamdata['team_name'] = $data['team_name'];
        $teamdata['tournament_id'] = $data['tournament_id'];
        $teamdata['user_id'] = $user->id;
        $teamdata['rzs'] = $data['rzs'];


        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('teamlogo', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $teamdata['location'] =  $fullpathurl;


        }
        else
        {
            $teamdata['location'] =  null;
        }

        $team = Team::firstOrCreate($teamdata);


        $pubgplayer = array(
            array(
                'pubg_id_name'=> $data['onename'],
                'pubg_id_number'=>$data['onenumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'leader',
                'playerserial'=> 1,
               ),
               array(
                'pubg_id_name'=> $data['twoname'],
                'pubg_id_number'=>$data['twonumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 2,
               ),
               array(
                'pubg_id_name'=> $data['threename'],
                'pubg_id_number'=>$data['threenumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 3,
               ),
               array(
                'pubg_id_name'=> $data['fourname'],
                'pubg_id_number'=>$data['fournumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 4,
               ),

            //    array(
            //     'pubg_id_name'=> $data['fivename'],
            //     'pubg_id_number'=>$data['fivenumber'],
            //     'tournament_id'=> $data['tournament_id'],
            //     'team_id'=>  $team->id ,
            //     'playertype'=> 'normal',
            //     'playerserial'=> 5,
            //    ),

            //    array(
            //     'pubg_id_name'=> $data['sixname'],
            //     'pubg_id_number'=>$data['sixnumber'],
            //     'tournament_id'=> $data['tournament_id'],
            //     'team_id'=>  $team->id ,
            //     'playertype'=> 'normal',
            //     'playerserial'=> 6,
            //    ),

        );

            $poung = Pubg::insert($pubgplayer);
            $userid = $user->id;
            $sms = $this->welcomesms($userid,$password,$data['tournament_id']);
            return redirect()->route('normal.login')->with('update', 'Registration Successfull');

    }




    public function regregister(Request $request)
    {
        //

        $data = $this->regvalidateRequest();


            $user = User::find(Auth::user()->id) ;

        $teamdata['team_name'] = $data['team_name'];
        $teamdata['tournament_id'] = $data['tournament_id'];
        $teamdata['user_id'] = $user->id;
        $teamdata['rzs'] = $data['rzs'];


        if ($request->hasFile('location')) {

            $baseurl = url('/');

            $images = $request->file('location');

            $extension = $images->extension();
            $filename = time() . '.' . $extension;
            $path = $images->storeAs('teamlogo', $filename, 'public');
            $fullpathurl = $baseurl . '/storage/' . $path;
            $teamdata['location'] =  $fullpathurl;


        }
        else
        {
            $teamdata['location'] =  null;
        }

        $team = Team::firstOrCreate($teamdata);


        $pubgplayer = array(
            array(
                'pubg_id_name'=> $data['onename'],
                'pubg_id_number'=>$data['onenumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'leader',
                'playerserial'=> 1,
               ),
               array(
                'pubg_id_name'=> $data['twoname'],
                'pubg_id_number'=>$data['twonumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 2,
               ),
               array(
                'pubg_id_name'=> $data['threename'],
                'pubg_id_number'=>$data['threenumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 3,
               ),
               array(
                'pubg_id_name'=> $data['fourname'],
                'pubg_id_number'=>$data['fournumber'],
                'tournament_id'=> $data['tournament_id'],
                'team_id'=>  $team->id ,
                'playertype'=> 'normal',
                'playerserial'=> 4,
               ),

            //    array(
            //     'pubg_id_name'=> $data['fivename'],
            //     'pubg_id_number'=>$data['fivenumber'],
            //     'tournament_id'=> $data['tournament_id'],
            //     'team_id'=>  $team->id ,
            //     'playertype'=> 'normal',
            //     'playerserial'=> 5,
            //    ),

            //    array(
            //     'pubg_id_name'=> $data['sixname'],
            //     'pubg_id_number'=>$data['sixnumber'],
            //     'tournament_id'=> $data['tournament_id'],
            //     'team_id'=>  $team->id ,
            //     'playertype'=> 'normal',
            //     'playerserial'=> 6,
            //    ),

        );

            $poung = Pubg::insert($pubgplayer);
            $userid = $user->id;
            $sms = $this->regwelcomesms($userid,$data['tournament_id']);
            return redirect()->route('register.tournamentload')->with('update', 'Registration Successfull');

    }






    public function welcomesms($userid,$password,$tournametid)
    {
        $tournametndetais = Tournament::find($tournametid);
        $userdetais = User::find($userid);
        $to = $userdetais->mobile;
        $token = "c3253885b10f98c971b719b5372a4b34";

        $message = "Congrats!" ." ". $userdetais->name. ", Your registration for"." ". $tournametndetais->tournament_name ." "."is compleated. You can login using your registered mobile or email as username and password :" ." ".$password ." "."for details call 01741077893";



        $url = "http://api.greenweb.com.bd/api.php?json";


        $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);

            //Result
            echo $smsresult;

            if ($smsresult) {
                return $smsresult;
            }

            //Error Display
            echo curl_error($ch);


    }

    public function regwelcomesms($userid,$tournametid)
    {
        $tournametndetais = Tournament::find($tournametid);
        $userdetais = User::find($userid);
        $to = $userdetais->mobile;
        $token = "c3253885b10f98c971b719b5372a4b34";
        $message = "Congrats!" ." ". $userdetais->name. ", Your registration for"." ". $tournametndetais->tournament_name ." "."is compleated. For details call 01741077893";


        $url = "http://api.greenweb.com.bd/api.php?json";


        $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
            ); // Add parameters in key value
            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);

            //Result
            echo $smsresult;

            if ($smsresult) {
                return $smsresult;
            }

            //Error Display
            echo curl_error($ch);


    }



    public function editpubg(Team $team)
    {
        $data = $team;
        if (Auth::user()->type == "normal") {
            return view('layouts.register.pubg.edit',compact('data'));
        }
        if((Auth::user()->type == "subadmin")||(Auth::user()->type == "admin")||(Auth::user()->type == "superadmin"))
        {
            return view('layouts.admin.pubg.edit',compact('data'));
        }

    }

    public function editpubgplayer(Pubg $pubg)
    {

        $data = $pubg;
        return view('layouts.register.pubg.playeredit',compact('data'));
    }


    public function update(Request $request, Pubg $pubg)
    {
        //
        $data = $this->playervalidation();

        $pubg->update($data);

        return back()->with('success','Data Update');

    }

    public function playervalidation()
    {

        $data = request()->validate([


            'pubg_id_name' => '',
            'pubg_id_number' => '',

        ]);

        return $data;

    }

    public function validateRequest()
    {


        if (request()->hasFile('location')) {


            $data = request()->validate([
                'name' => 'required',
                'mobile' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'rzs' => 'required',
                'onename' => 'required',
                'onenumber' => 'required',
                'twoname' => 'required',
                'twonumber' => 'required',
                'threename' => 'required',
                'threenumber' => 'required',
                'fourname' => 'required',
                'fournumber' => 'required',
                // 'fivename' => '',
                // 'fivenumber' => '',
                // 'sixname' => '',
                // 'sixnumber' => '',
                'team_name' => 'required',
                'tournament_id' => 'required',
                'location' => 'max:2048|dimensions:max_width=1922,max_height=1082',
            ]);
        }
         else {

            $data = request()->validate([
                'name' => 'required',
                'mobile' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'rzs' => 'required',
                'onename' => 'required',
                'onenumber' => 'required',
                'twoname' => 'required',
                'twonumber' => 'required',
                'threename' => 'required',
                'threenumber' => 'required',
                'fourname' => 'required',
                'fournumber' => 'required',
                // 'fivename' => '',
                // 'fivenumber' => '',
                // 'sixname' => '',
                // 'sixnumber' => '',
                'team_name' => 'required',
                'tournament_id' => 'required',
                'location' => '',
            ]);
        }



        return $data;
    }


    public function regvalidateRequest()
    {


        if (request()->hasFile('location')) {


            $data = request()->validate([
                'rzs' => 'required',
                'onename' => 'required',
                'onenumber' => 'required',
                'twoname' => 'required',
                'twonumber' => 'required',
                'threename' => 'required',
                'threenumber' => 'required',
                'fourname' => 'required',
                'fournumber' => 'required',
                // 'fivename' => '',
                // 'fivenumber' => '',
                // 'sixname' => '',
                // 'sixnumber' => '',
                'team_name' => 'required',
                'tournament_id' => 'required',
                'location' => 'max:2048|dimensions:max_width=1922,max_height=1082',
            ]);
        }
         else {

            $data = request()->validate([
               'rzs' => 'required',
                'onename' => 'required',
                'onenumber' => 'required',
                'twoname' => 'required',
                'twonumber' => 'required',
                'threename' => 'required',
                'threenumber' => 'required',
                'fourname' => 'required',
                'fournumber' => 'required',
                // 'fivename' => '',
                // 'fivenumber' => '',
                // 'sixname' => '',
                // 'sixnumber' => '',
                'team_name' => 'required',
                'tournament_id' => 'required',
                'location' => '',
            ]);
        }



        return $data;
    }



}
