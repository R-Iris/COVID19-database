<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CountriesController extends BaseController
{
    function index()
    {
        return view('countries_and_prostaters');
    }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'regionID' => 'required|int',
            'name' => 'required',
            'govID' => 'required|int',
        ]);

        $country = (new Country)->findCountryByCountryID($request->get('countryID'))->first();

        $country->update([
            'regionID' => $request->input('regionID') ? $request->input('regionID') : $country['regionID'],
            'name' => $request->input('name') ? $request->input('name') : $country['name'],
            'govID' => $request->input('govID') ? $request->input('govID') : $country['govID'],
        ]);

        return redirect('countries_and_prostaters')->with('success', 'Country Updated');
    }

    public function delete(Request $request)
    {
        $country = (new Country)->findCountryByCountryID($request->input('countryID'))->first();
        $country->delete();

        return redirect('countries_and_prostaters')->with('success', 'Country Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'regionID' => 'required|int',
            'name' => 'required',
            'govID' => 'required|int',
        ]);

        $country = [
            'countryID' => (new Country)->countAllCountries() + 1
        ];


        DB::table('countries')->insert(array_merge($country, $request->except(['_token'])));

        return redirect('countries_and_prostaters')->with('success', 'Country Added');
    }
}
