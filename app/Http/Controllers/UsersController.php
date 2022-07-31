<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends BaseController
{
    function index()
    {
        return view('users');
    }

   public function edit(int $userID)
   {
       $user = (new User)->findUserbyUserID($userID);
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

        $user = (new User)->findUserbyUserID($request->get('userID'))->first();

        $user->update([
            'firstName' => $request->input('firstName') ? $request->input('firstName') : $user['firstName'],
            'lastName' => $request->input('lastName') ? $request->input('lastName') : $user['lastName'],
            'orgID' => $request->input('orgID') ? $request->input('orgID') : $user['orgID'],
            'citizenship' => $request->input('citizenship') ? $request->input('citizenship') : $user['citizenship'],
            'email' => $request->input('email') ? $request->input('email') : $user['email'],
            'phone' => $request->input('phone') ? $request->input('phone') : $user['phone'],
            'role' => $request->input('role') ? $request->input('role') : $user['role'],
            'birthDate' => $request->input('birthDate') ? $request->input('birthDate') : $user['birthDate'],
            'password' => $request->input('password') ? $request->input('password') : $user['password']
        ]);

        return redirect('users')->with('success', 'User Updated');
    }

    public function delete(Request $request)
    {
        $user = (new User)->findUserbyUserID($request->input('userID'))->first();
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
            'userID' => (new User)->countAllUsers() + 1
        ];


        DB::table('users')->insert(array_merge($userID, $request->except(['_token'])));

        return redirect('users')->with('success', 'User Added');
    }

    public function activate(Request $request)
    {
        DB::table('suspendedAccounts')->where('userID', '=', $request->input('userID'))->delete();

        return redirect('users')->with('success', 'User Activated');
    }

    public function suspend(Request $request)
    {
        DB::table('suspendedAccounts')->insert([
            'userID' => $request->input('userID'),
            'suspensionDate' => Carbon::now(),
            ]);

        return redirect('users')->with('success', 'User Suspended');
    }
}
