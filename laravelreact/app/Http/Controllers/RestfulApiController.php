<?php

namespace App\Http\Controllers;

use App\Twitter;
use App\User;
use Illuminate\Http\Request;

class RestfulApiController extends Controller
{
    public function index(){
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
            $twit->user_id = 1;
            $twit->tweet = $request->twitterfield;
            $twit->remember_token = 'via react!';
            $twit->save();
        }
        return response()->json(['status','success!']);

    }
}
