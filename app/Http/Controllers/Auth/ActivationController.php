<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function activation(Request $request){
//        DD($request);
        $user =User::ByActivationColumn($request->email, $request->token)->firstOrFail();
        $user->update([
           'active' => true,
           'activation_token' => null
        ]);
        Auth::loginUsingId($user->id);
        return redirect()->route('home')->with('status', 'Your account is activate');
    }
}
