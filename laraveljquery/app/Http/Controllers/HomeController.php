<?php

namespace App\Http\Controllers;

use App\Twitter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$twitter = Twitter::all(); // Get all without short
        //$twitter = Twitter::orderBy('created_at','DESC')->get(); // Eloquent Simple
        $twitter = User::join('twitter', 'twitter.user_id', '=', 'users.id')
            ->select('users.name','twitter.*')
            ->orderBy('twitter.created_at','DESC')
            ->get();
        //dd($twitter);
        return view('home',['twit' => $twitter]);
    }

    public function add(Request $request){
        if(!$request->twitterfield){
            return response()->json(['responseText' => 'Error!'], 200);
        }else{
            $twit = new Twitter;
            $twit->user_id = $request->users_id;
            $twit->tweet = $request->twitterfield;
            $twit->remember_token = $request->_token;
            $twit->save();
            return response()->json(['responseText' => 'Success!'], 200);
        }

    }

    public function ajaxStore()
    {
        $idUser               = Input::get('users_id');
        $idTwitter            = Input::get('twitterfield');
        $rToken               = Input::get('_token');
        $twit = new Twitter;
        $twit->user_id = $idUser;
        $twit->tweet = $idTwitter;
        $twit->remember_token = $rToken;
        $twit->save();

        if ($twit) {
            return response()->json([
                'status'     => 'success',
                'idUser'     => $idUser,
                'idTwit'     => $idTwitter]);
        } else {
            return response()->json([
                'status' => 'error']);
        }
    }

    public static function getName($id){
        $getusr = User::find($id);
        return $getusr;
    }

    public function delete($id){
        $twitter = Twitter::find($id);
        $twitter->delete();
        return redirect(route('home'));
    }


    public function resultView(){
        $twitter = User::join('twitter', 'twitter.user_id', '=', 'users.id')
            ->select('users.name','twitter.*')
            ->orderBy('twitter.created_at','DESC')
            ->get();
        //dd($twitter);
        return view('result',['twit' => $twitter]);
    }
}
