<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SigninController extends Controller
{

    public function showLoginForm()
    {
        if ( Auth::check() ) {
            return redirect()->route("profile");
        } else {
            return view("loginform");
        }
    }

    public function showSignUpForm()
    {
        // Auth::logout();
        return view("signupform");
    }

    public function register(Request $request)
    {
        // validating data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string',
            'role' => 'required|integer',
            'avatar' => 'required|file',
            'password' => 'required|string',
        ]);

        // saving file
        $file = $request->file('avatar');
        $destinationPath = 'img/avatar';
        $originalFile = $file->getClientOriginalName();
        $avater = strtotime(date('Y-m-d-H:isa')) . $originalFile;
        $file->move($destinationPath, $avater);




        $pin = str_split(str_shuffle("123456"), 1);

        User::insert([
            "name" => $request->name,
            "email" => $request->email,
            "username" => $request->username,
            "role" => $request->role,
            "password" => Hash::make($request->password),
            "avatar" => $avater,
            "verify_pin" => implode($pin)
        ]);

        $email = $request->email;

        $data = [
            "pin" => $pin
        ];

        // sending pin
        Mail::send('verificationpintemplate', $data, function ($message) use ($email) {
            $message->to($email);
            $message->subject('Verify Your Email Address');
        });

        Auth::attempt(['username' => $request->username, 'password' => $request->password]);

        return redirect()->route("profile");
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            if(!Auth::user()->verify_pin)
            {
                return view("profile");
            }
            return redirect()->route("verifypinPage");
        }

        // dd($request);
        return back();
    }

    public function logout()
    {
        Auth::logout();
        return view("loginform");
    }
}
