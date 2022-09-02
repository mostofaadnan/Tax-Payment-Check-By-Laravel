<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaxHolder;
use App\Models\TaxPayment;
use Illuminate\Support\Facades\Auth;
class AdminHomeController extends Controller
{
    public function index()
    {
        $taxholder = TaxHolder::where('union_id', Auth::user()->union_id)->count();
        $tax = TaxHolder::where('union_id', Auth::user()->union_id)->sum('amount');
        return view('BackEnd.Admin.Home.index',compact('taxholder','tax'));
    }
}
