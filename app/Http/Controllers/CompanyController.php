<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function show($id)
    {
        $company = Company::find($id);
        return view('pages.company.show', compact("company"));
    }


    public function edit($id)
    {
        $company = Company::find($id);
        return view('pages.company.edit', compact("company"));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            'longitude' => "required",
            'latitude' => "required",
            'radius_km' => "required",
            'time_in' => "required",
            'time_out' => "required",
            'address' => 'required'
        ]);


        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->radius_km =  $request->radius_km;
        $company->time_in =  $request->time_in;
        $company->time_out =  $request->time_out;
        $company->save();

        return redirect()->route('companies.show',1)->with("success", "Company updated successfully.");
    }


}
