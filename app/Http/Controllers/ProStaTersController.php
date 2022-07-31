<?php

namespace App\Http\Controllers;

use App\Models\ProStaTer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProStaTersController extends BaseController
{
    function index()
    {
        return view('countries_and_prostaters');
    }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'countryID' => 'required|int',
            'population' => 'required|int',
            'name' => 'required',
            'numInfected' => 'required|int',
            'numVax' => 'required|int',
            'numInfectedVax' => 'required|int',
            'covidDeaths' => 'required|int',
        ]);

        $prostater = (new ProStaTer)->findProStaTerByProStaterID($request->get('proStaTerID'))->first();

        $prostater->update([
            'countryID' => $request->input('countryID') ? $request->input('countryID') : $prostater['countryID'],
            'population' => $request->input('population') ? $request->input('population') : $prostater['population'],
            'name' => $request->input('name') ? $request->input('name') : $prostater['name'],
            'numInfected' => $request->input('numInfected') ? $request->input('numInfected') : $prostater['numInfected'],
            'numVax' => $request->input('numVax') ? $request->input('numVax') : $prostater['numVax'],
            'numInfectedVax' => $request->input('numInfectedVax') ? $request->input('numInfectedVax') : $prostater['numInfectedVax'],
            'covidDeaths' => $request->input('covidDeaths') ? $request->input('covidDeaths') : $prostater['covidDeaths'],
        ]);

        return redirect('countries_and_prostaters')->with('success', 'ProStaTer Updated');
    }

    public function delete(Request $request)
    {
        $prostater = (new ProStaTer)->findProStaTerByProStaterID($request->input('proStaTerID'))->first();
        $prostater->delete();

        return redirect('countries_and_prostaters')->with('success', 'ProStaTer Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'countryID' => 'required|int',
            'population' => 'required|int',
            'name' => 'required',
            'numInfected' => 'required|int',
            'numVax' => 'required|int',
            'numInfectedVax' => 'required|int',
            'covidDeaths' => 'required|int',
        ]);

        $prostater = [
            'proStaTerID' => (new ProStaTer)->countAllProStaTer() + 1
        ];


        DB::table('ProStaTer')->insert(array_merge($prostater, $request->except(['_token'])));

        return redirect('countries_and_prostaters')->with('success', 'ProStaTer Added');
    }
}
