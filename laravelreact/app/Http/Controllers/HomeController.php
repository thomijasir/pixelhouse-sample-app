<?php

namespace App\Http\Controllers;

use App\Twitter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use JavaScript;

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
        JavaScript::put([
            'name' => "Thomi Jasir"
        ]);

        $twitter = User::join('twitter', 'twitter.user_id', '=', 'users.id')
            ->select('users.name','twitter.*')
            ->orderBy('twitter.created_at','DESC')
            ->get();
        //dd($twitter);

        return view('home',['twit' => $twitter]);
    }

    public function getall()
    {
        //$twitter = Twitter::all(); // Get all without short
        //$twitter = Twitter::orderBy('created_at','DESC')->get(); // Eloquent Simple
        $twitter = User::join('twitter', 'twitter.user_id', '=', 'users.id')
            ->select('users.name','twitter.*')
            ->orderBy('twitter.created_at','DESC')
            ->get();
        //dd($twitter);

        return response()->json($twitter);
    }

    public function add(Request $request){
        if(!$request->twitterfield){
            dd('whoops!');
        }else{
            $twit = new Twitter;
            $twit->user_id = $request->users_id;
            $twit->tweet = $request->twitterfield;
            $twit->remember_token = $request->_token;
            $twit->save();
        }
        return redirect(route('home'));
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
}
