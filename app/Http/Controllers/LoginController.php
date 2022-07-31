<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    function index()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {
        Validator::make($request->toArray(), [
            'userID' => 'required|exists:users.userID',
            'password' => 'required|alphaNum|min3'
        ]);

        $user = User::where('userID', $request->get('userID'))
            ->where('password', $request->get('password'))
            ->first();

        if ($user)
        {
            Auth::login($user);

            //TODO: persist session through all endpoints
            $this->logged_user = $user;

            return redirect()->route('articles')->with(['user' => $user]);
        }
        else {
            return redirect()->route('login');
        }
    }
}
