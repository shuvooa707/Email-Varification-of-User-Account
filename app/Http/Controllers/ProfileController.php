<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show()
    {
        if ( !Auth::user()->verify_pin ) {
            return view("profile");
        } else {
            return redirect()->route('verifypinPage');
        }
    }


    public function showVerifyPage()
    {
        return view("verifyprofile");
    }

    public function showvVerifypinPage()
    {
        return view("verificationpin");
    }

    public function verify(Request $request)
    {
        $pin = $request->pin;
        // dd(Auth::user()->verify_pin);
        if ( Auth::user()->verify_pin == $pin )
        {
            // dd(User::find(Auth::user()->id));
            User::find(Auth::user()->id)->update([
                "verify_pin" => null
            ]);
            return [ "msg" => "vsuccess" ];
        }
        else
        {
            return [ "msg" => "vfailed" ];
        }
    }
}
