<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\TaxHolder;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
class AreaViewController extends Controller
{
    public function index($id)
    {
        $area = area::find($id);
        /* dd($id); */
        return view('FrontEnd.Area.index', compact('area','id'));
    }
    
    public function TaxHolderLoadAllArea($area_id)
    {
        $TaxHolder = TaxHolder::orderBy('id', 'desc')
            ->where('area_id', $area_id)
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
        $TaxHolders = TaxHolder::where('area_id', $id)
            ->get();
        $pdf = PDF::loadView('FrontEnd.pdf.unionlist', compact('TaxHolders'));
        return $pdf->stream('taxpayerinfo.pdf');

    }
}