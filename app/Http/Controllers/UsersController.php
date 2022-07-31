<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends BaseController
{
    function index()
    {
        return view('users');
    }

   public function edit(int $userID)
   {
       $user = (new \App\Models\User)->findUserbyUserID($userID);
       return view('users.edit')->with('user', $user);
   }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'orgID' => 'filled|int',
            'citizenship' => 'required|int',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'birthDate' => 'required',
            'password' => 'required'
        ]);

        $user = (new \App\Models\User)->findUserbyUserID($request->get('userID'))->first();

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->orgID = $request->input('orgID');
        $user->citizenship = $request->input('citizenship');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->birthDate = $request->input('birthDate');
        $user->password = $request->input('password');


        $user->update([
            'firstName' => $request->input('firstName')
        ]);

        return redirect('users')->with('success', 'User Updated');
    }

    public function delete(Request $request)
    {
        $user = (new \App\Models\User)->findUserbyUserID($request->input('userID'))->first();
        $user->delete();

        return redirect('users')->with('success', 'User Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'orgID' => 'filled|int',
            'citizenship' => 'required|int',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'birthDate' => 'required',
            'password' => 'required'
        ]);

        $userID = [
            'userID' => (new \App\Models\User)->countAllUsers() + 1
        ];


        DB::table('users')->insert(array_merge($userID, $request->except(['_token'])));

        return redirect('users')->with('success', 'User Added');
    }
}
