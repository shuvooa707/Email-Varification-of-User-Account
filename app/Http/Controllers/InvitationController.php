<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function invite(Request $request)
    {
        try {
            $email = $request->email;
            // sending pin
            Mail::send('invitation', [], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Invitation Email');
            });
            return ["msg" => "success"];
        } catch (\Throwable $th) {
            return ["msg" => "failed"];
        }

    }
}
