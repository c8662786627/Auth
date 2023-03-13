<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    //
    
    public function homePage(){
        $user_id=session('user_id');
        $user = User::where('user_id',$user_id)->first();

        $binding=[
            'title'=>'首頁',
            'name'=> $user->name,
            'email'=> $user->email,
        ];
        return view('welcome',$binding);
    }
}
