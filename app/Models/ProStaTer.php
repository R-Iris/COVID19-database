<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProStaTer extends Model
{
    public $proStaTerID;
    public $countryID;
    public $population;
    public $name;
    public $numInfected;
    public $numVax;
    public $numInfectedUnVax;
    public $covidDeaths;

   protected $table = 'ProStaTer';
   protected $primaryKey = 'proStaTerID';

    protected $fillable = [
        'proStaTerID',
        'countryID',
        'population',
        'name',
        'numInfected',
        'numVax',
        'numInfectedUnVax',
        'covidDeaths'
    ];

   // Model is not timestamped
   public $timestamps  = false;

   public function getAll(): Collection
   {
       return ProStaTer::all();
   }

   public function findProStaTerByProStaterID(int $proStaTerID): Collection
   {
       return ProStaTer::where('proStaTerID', $proStaTerID)->get();
   }

    public function countAllProStaTer(): int
    {
        return ProStaTer::all()->count();
    }
}
