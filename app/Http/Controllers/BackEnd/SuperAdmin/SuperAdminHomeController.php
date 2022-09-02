<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\district;
use App\Models\state;
use App\Models\TaxHolder;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;

class SuperAdminHomeController extends Controller
{
    public function index()
    {

        $state = state::all()->count();
        $district = district::all()->count();
        $upazila = Upazila::all()->count();
        $union = Union::all()->count();
        $area = area::all()->count();
        $taxholder = TaxHolder::all()->count();
        $totaladmin = User::all()->count();
        $tax = TaxHolder::all()->sum('amount');
        return view('BackEnd/SuperAdmin/Home/index', compact('state', 'district', 'upazila', 'union', 'area', 'taxholder', 'totaladmin', 'tax'));

    }
}
