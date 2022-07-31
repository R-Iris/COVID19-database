<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    public $recordID;
    public $date;
    public $update;
    public $countryID;

    protected $table = 'historicalRecords';
    protected $primaryKey = 'recordID';

    protected $fillable = [
        'recordID',
        'date',
        'update',
        'countryID'
    ];

    // Model is not timestamped
    public $timestamps  = false;

    public function getAll(): Collection
    {
        return Record::all();
    }

    public function findRecordByRecordID(int $recordID): Collection
    {
        return Record::where('recordID', $recordID)->get();
    }

    public function countAllRecords(): int
    {
        return Record::all()->count();
    }
}
