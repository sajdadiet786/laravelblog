<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function githubredirect(Request $request){
        return Socialite::driver('github')->redirect();
    }
    public function githubcallback(Request $request){
        $userdata = Socialite::driver('github')->user();
        
        // DD($userdata);
        $user=User::where('email',$userdata->email)->where('auth_type','github')->first();
        if($user){
            Auth::login($user);
            // dd($user);
    
            return redirect('/home');
        }
        else{

            $uuid=Str::uuid()->toString();
            $user=new User();
            $user->name=$userdata->name;
            $user->email=$userdata->email;
            $user->password=Hash::make($uuid.now());
            $user->auth_type='github';
            $user->save();
            Auth::login($user);
            // dd($user);
    
            return redirect('/home');
        }
    }

    public function googleredirect(Request $request){
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(Request $request){
        $userdata = Socialite::driver('google')->user();
        
        // DD($userdata);
        $user=User::where('email',$userdata->email)->where('auth_type','google')->first();
        if($user){
            Auth::login($user);
            // dd($user);
    
            return redirect('/home');
        }
        else{

            $uuid=Str::uuid()->toString();
            $user=new User();
            $user->name=$userdata->name;
            $user->email=$userdata->email;
            $user->password=Hash::make($uuid.now());
            $user->auth_type='google';
            $user->save();
            Auth::login($user);
            // dd($user);
    
            return redirect('/home');
        }
    }

}
