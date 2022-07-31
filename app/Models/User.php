<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    public $userID;
    public $firstName;
    public $lastName;
    public $orgID;
    public $citizenship;
    public $email;
    public $phone;
    public $role;
    public $birthDate;
    public $password;

    protected $table = 'users';
    protected $primaryKey = 'userID';

    protected $fillable = [
        'userID',
        'firstName',
        'lastName',
        'orgID',
        'citizenship',
        'email',
        'phone',
        'role',
        'birthDate',
        'password'
    ];

    // Model is not timestamped
    public $timestamps  = false;

    public function getAll(): Collection
    {
        return User::all();
    }

    public function findUserbyUserID(int $userID): Collection
    {
        return User::where('userID', $userID)->get();
    }

    public function countAllUsers(): int
    {
        return User::all()->count();
    }

    public function isUserSuspended(int $userID): int
    {
        $query = DB::table('users')
            ->join('suspendedAccounts', function ($join) use ($userID) {
                $join->on('users.userID', '=', 'suspendedAccounts.userID')
                    ->where('suspendedAccounts.userID', '=', $userID);
            })
            ->get()
            ->count();

        return $query;
    }
}
