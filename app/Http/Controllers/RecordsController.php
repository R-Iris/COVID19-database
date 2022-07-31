<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RecordsController extends BaseController
{
    function index()
    {
        return view('countries_and_prostaters');
    }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'date' => 'required',
            'update' => 'required',
            'countryID' => 'required|int',
        ]);

        $record = (new Record)->findRecordByRecordID($request->get('recordID'))->first();

        $record->update([
            'date' => $request->input('date') ? $request->input('date') : $record['date'],
            'update' => $request->input('update') ? $request->input('name') : $record['update'],
            'countryID' => $request->input('countryID') ? $request->input('govID') : $record['countryID'],
        ]);

        return redirect('countries_and_prostaters')->with('success', 'Record Updated');
    }

    public function delete(Request $request)
    {
        $record = (new Record)->findRecordByRecordID($request->input('recordID'))->first();
        $record->delete();

        return redirect('countries_and_prostaters')->with('success', 'Record Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'date' => 'required',
            'update' => 'required',
            'countryID' => 'required|int',
        ]);

        $record = [
            'recordID' => (new Record)->countAllRecords() + 1
        ];


        DB::table('historicalRecords')->insert(array_merge($record, $request->except(['_token'])));

        return redirect('countries_and_prostaters')->with('success', 'Record Added');
    }
}
