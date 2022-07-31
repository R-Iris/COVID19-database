<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public $orgID;
    public $name;
    public $type;

    protected $table = 'organizations';
    protected $primaryKey = 'orgID';

    protected $fillable = [
        'orgID',
        'name',
        'type',
    ];

    // Model is not timestamped
    public $timestamps  = false;

    public function getAll(): Collection
    {
        return Organization::all();
    }

    public function findOrgByOrgID(int $orgID): Collection
    {
        return Organization::where('orgID', $orgID)->get();
    }

    public function countAllOrganizations(): int
    {
        return Organization::all()->count();
    }
}
