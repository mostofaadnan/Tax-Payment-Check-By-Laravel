<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaxHolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TaxHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('BackEnd.Admin.TaxHolder.index');
    }
    public function LoadAll()
    {
        $TaxHolder = TaxHolder::orderBy('id', 'desc')
            ->where('union_id', Auth::user()->union_id)
            ->latest()
            ->get();
        return Datatables::of($TaxHolder)
            ->addIndexColumn()
            ->addColumn('Location', function (TaxHolder $TaxHolder) {
                $state = $TaxHolder->UnionName->UpazilaName->DistricName->StateName->name;
                $district = $TaxHolder->UnionName->UpazilaName->DistricName->name;
                $upazila = $TaxHolder->UnionName->UpazilaName->name;
                $union = $TaxHolder->UnionName->name;
                $area = $TaxHolder->AreaName->name;
                return '<b>State: </b>' . $state .
                    '<br><b>District: </b>' . $district .
                    '<br><b>Upazila: </b>' . $upazila .
                    '<br><b>Union: </b>' . $union .
                    '<br><b>Area: </b>' . $area;
            })
            ->addColumn('action', function ($TaxHolder) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $TaxHolder->id . '" data-bs-toggle="modal" data-bs-target="#taxholdermodel"><i class="bx bxs-edit"></i></button>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['action', 'Location'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackEnd.Admin.TaxHolder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taxholder = new TaxHolder();
    
        $taxholder->union_id = Auth::user()->union_id;
        $taxholder->area_id = $request->area_id;
        $taxholder->date = $request->date;
        $taxholder->name = $request->name;
        $taxholder->holding_number = $request->holding_number;
        $taxholder->memo_number = $request->memo_number;
        $taxholder->amount = $request->amount;
        if ($taxholder->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'New Tax Holder Successfuly save',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to save',
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $taxholder = TaxHolder::with('AreaName', 'UnionName.UpazilaName.DistricName.StateName')->find($request->id);
        return response()->json($taxholder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxholder = TaxHolder::find($id);
        return view('BackEnd.Admin.TaxHolder.edit', compact($taxholder));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $taxholder = TaxHolder::find($request->id);
        $taxholder->area_id = $request->area_id;
        $taxholder->date = $request->date;
        $taxholder->name = $request->name;
        $taxholder->holding_number = $request->holding_number;
        $taxholder->memo_number = $request->memo_number;
        $taxholder->amount = $request->amount;
        if ($taxholder->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'New Tax Holder Successfuly Update',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to Update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $taxholders = TaxHolder::find($id);

        if (!is_null($taxholders)) {
            $taxholders->delete();
        }

    }


    public function dataGet(Request $request)
    {
        $search = $request->search;
        $taxholder = TaxHolder::with('AreaName', 'UnionName.UpazilaName.DistricName.StateName')
            ->where('nid', $search)
            ->Orwhere('tax_no', $search)
            ->Orwhere('phone', $search)
            ->first();
        if ($taxholder) {
            return response()->json([
                'status' => 200,
                'taxholder' => $taxholder,
            ]);
        } else {
            return response()->json([
                'status' => 500,

            ]);
        }
        return response()->json($taxholder);
    }

    ///Super Admin
    public function TaxHolder()
    {
        return view('BackEnd.SuperAdmin.taxholder.index');
    }
    public function SuperAdminLoadAll()
    {
        $TaxHolder = TaxHolder::orderBy('id', 'desc')
            ->latest()
            ->get();
        return Datatables::of($TaxHolder)
            ->addIndexColumn()
            ->addColumn('Location', function (TaxHolder $TaxHolder) {
                $state = $TaxHolder->UnionName->UpazilaName->DistricName->StateName->name;
                $district = $TaxHolder->UnionName->UpazilaName->DistricName->name;
                $upazila = $TaxHolder->UnionName->UpazilaName->name;
                $union = $TaxHolder->UnionName->name;
                $area = $TaxHolder->AreaName->name;
                return '<b>State: </b>' . $state .
                    '<br><b>District: </b>' . $district .
                    '<br><b>Upazila: </b>' . $upazila .
                    '<br><b>Union: </b>' . $union .
                    '<br><b>Area: </b>' . $area;

            })

            ->addColumn('action', function ($TaxHolder) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $TaxHolder->id . '" data-bs-toggle="modal" data-bs-target="#taxholdermodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $TaxHolder->id . '"><i class="bx bxs-trash"></i></button>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['action', 'Location'])
            ->make(true);
    }
}