<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\TaxHolder;
use App\Models\Union;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;

class UnionViewController extends Controller
{
    public function index()
    {
        $unions = Union::where('status', 1)->get();
        return view('FrontEnd.Union.index', compact('unions'));
    }
    public function UnionDetails($id)
    {
        $union = Union::find($id);
        return view('FrontEnd.Union.details', compact('union'));
    }

    public function TaxHolderLoadAll($union_id)
    {
        $TaxHolder = TaxHolder::orderBy('id', 'desc')
            ->where('union_id', $union_id)
            ->latest()
            ->get();
        return Datatables::of($TaxHolder)
            ->addIndexColumn()
            ->addColumn('Location', function (TaxHolder $TaxHolder) {
                $state = $TaxHolder->UnionName->UpazilaName->DistricName->StateName->name;
                $district = $TaxHolder->UnionName->UpazilaName->DistricName->name;
                $upazila = $TaxHolder->UnionName->UpazilaName->name;
                $union = $TaxHolder->UnionName->name;
                return '<b>State: </b>' . $state . '<br><b>District: </b>' . $district . '<br><b>Upazila: </b>' . $upazila . '<br><b>Union: </b>' . $union . '<br><b>Area/Village:</b>' . $TaxHolder->AreaName->name;
            })
            ->rawColumns(['Location'])
            ->make(true);
    }

    public function pdf($id)
    {
   
        $TaxHolders = TaxHolder::where('union_id', $id)
            ->get();
        $pdf = PDF::loadView('FrontEnd.pdf.unionlist', compact('TaxHolders'));
        return $pdf->stream('taxpayerinfo.pdf');

    }
}