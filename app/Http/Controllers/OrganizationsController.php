<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrganizationsController extends BaseController
{
    function index()
    {
        return view('organizations');
    }

    public function update(Request $request)
    {
        Validator::make($request->toArray(), [
            'name' => 'required',
            'type' => 'required',
        ]);

        $organization = (new Organization)->findOrgByOrgID($request->get('orgID'))->first();

        $organization->update([
            'name' => $request->input('name') ? $request->input('name') : $organization['name'],
            'type' => $request->input('type') ? $request->input('type') : $organization['type'],
        ]);

        return redirect('organizations')->with('success', 'Organization Updated');
    }

    public function delete(Request $request)
    {
        $organization = (new Organization)->findOrgByOrgID($request->input('orgID'))->first();
        $organization->delete();

        return redirect('organizations')->with('success', 'Organization Deleted');
    }

    public function add(Request $request)
    {
        Validator::make($request->toArray(), [
            'name' => 'required',
            'type' => 'required',
        ]);

        $organization = [
            'orgID' => (new Organization)->countAllOrganizations() + 1
        ];


        DB::table('organizations')->insert(array_merge($organization, $request->except(['_token'])));

        return redirect('organizations')->with('success', 'Organization Added');
    }
}
