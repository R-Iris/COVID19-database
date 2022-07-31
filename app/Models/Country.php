<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    public $countryID;
    public $regionID;
    public $name;
    public $govID;

    protected $table = 'countries';
    protected $primaryKey = 'countryID';

    protected $fillable = [
        'countryID',
        'regionID',
        'name',
        'govID'
    ];

    // Model is not timestamped
    public $timestamps  = false;

    public function getAll(): Collection
    {
        return Country::all();
    }

    public function findCountryByCountryID(int $countryID): Collection
    {
        return Country::where('countryID', $countryID)->get();
    }

    public function countAllCountries(): int
    {
        return Country::all()->count();
    }

    public function getHistoricalRecordByCountryID(int $countryID): Collection
    {
        return new Collection(DB::table('historicalRecords')->where('countryID', $countryID)->get());
    }
}
