<?php

namespace App\Http\Controllers;

use App\Tools;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $display = new Tools();
        $this->middleware('auth');
    }

    public function index(){

        return view('profile');
    }

    public function update(Request $request){
        $getID      = $request->input('user_id');
        $getName    = $request->input('name');
        $getEmail   = $request->input('email');
        $getPass    = $request->input('password');
        $getFile    = $request->file('img');
        $destination = base_path() . '/public/images';
        if ($request->hasFile('img')) {
            $getFile->move($destination,$getID.'.jpg');
        }
        $user = User::find($getID);
        $user->name  = $getName;
        $user->email = $getEmail;
        if($getPass){$user->password = Hash::make($getPass);}
        $user->save();
        return redirect(route('home'));
    }
}
