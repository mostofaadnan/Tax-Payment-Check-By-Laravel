<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\TaxHolder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function index()
    {
        return view('BackEnd.SuperAdmin.area.index');
    }

    public function LoadAll()
    {
        $area = area::orderBy('id', 'desc')
            ->latest()
            ->get();
        return DataTables::of($area)
            ->addIndexColumn()
            ->addColumn('status', function (area $area) {
                return $area->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('state', function (area $area) {
                return $area->UnionName->UpazilaName->DistricName->StateName->name;
            })
            ->addColumn('district', function (area $area) {
                return $area->UnionName->UpazilaName->DistricName->name;
            })
            ->addColumn('upazila', function (area $area) {
                return $area->UnionName->UpazilaName->name;
            })
            ->addColumn('union', function (area $area) {
                return $area->UnionName->UpazilaName->name;
            })
            ->addColumn('action', function ($area) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $area->id . '" data-bs-toggle="modal" data-bs-target="#areamodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $area->id . '"><i class="bx bxs-trash"></i></button>';

                if ($area->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $area->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $area->id . '">Inactive</button>';
                }
                $button .= '</div>';
                return $button;
            })

            ->make(true);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $area = new area();
        $area->union_id = $request->union_id;
        $area->name = $request->name;
        $area->status = $request->status;
        if ($area->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data successfuly save',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to save',
            ]);
        }

    }

    public function show(Request $request)
    {
        $area = area::with('UnionName.UpazilaName.DistricName.StateName')->find($request->id);
        return response()->json($area);
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $area = area::find($id);
        $area->union_id = $request->union_id;
        $area->name = $request->name;
        $area->status = $request->status;
        if ($area->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data successfuly Update',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to Update',
            ]);
        }
    }

    public function destroy($id)
    {

        $area = area::find($id);
        if (!is_null($area)) {
            $taxholders = TaxHolder::where('area_id', $area->id)->get();
            foreach ($taxholders as $holder) {
                if (!is_null($holder)) {
                    $holder->delete();
                }
            }
            $area->delete();
        }
    }

    public function Active($id)
    {

        $area = area::find($id);
        $area->status = 1;
        if ($area->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Active successfuly',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to Active',
            ]);
        }
    }
    public function InActive($id)
    {

        $area = area::find($id);
        $area->status = 0;
        if ($area->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Inactive successfuly',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Data fail to Inactive',
            ]);
        }
    }
    public function GetList($id)
    {
        $area = area::where('union_id', $id)
            ->get();
        return response()->json($area);

    }
}
