<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function show()
    {
        $company = Company::find(1);
        return  response(["company"=> $company],200);
    }
}
