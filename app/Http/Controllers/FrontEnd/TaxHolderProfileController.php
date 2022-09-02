<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\TaxHolder;
use App\Models\Union;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaxHolderProfileController extends Controller
{
    public function Profile(Request $request)
    {
        Session::put('searchdata', $request->searchdata);
        $taxholder = TaxHolder::where('holding_number', $request->searchdata)
            ->Orwhere('memo_number', $request->searchdata)
            ->get();
        $unions = Union::where('status', 1)->get();
        return view('FrontEnd.Search.searchlist', compact('taxholder', 'unions'));
    }

    public function getCheckData(Request $request)
    {
        $searchdata = $request->searchdata;
        $taxholder = TaxHolder::where('holding_number', $searchdata)
            ->Orwhere('memo_number', $searchdata)
            ->first();
        if ($taxholder) {
            return response()->json([
                'status' => 200,
                'dataid' => $taxholder->id,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }

    }
    public function Pdf()
    {
        $searchdata = Session::get('searchdata');
        $TaxHolders = TaxHolder::where('holding_number', $searchdata)
            ->Orwhere('memo_number', $searchdata)
            ->get();
        $pdf = PDF::loadView('FrontEnd.pdf.unionlist', compact('TaxHolders'));
        return $pdf->stream('taxpayerinfo.pdf');

    }

}
