<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\TaxHolder;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UpazilaController extends Controller
{
    public function index()
    {
        return view('BackEnd.SuperAdmin.upazila.index');
    }

    public function LoadAll()
    {
        $upazila = upazila::orderBy('id', 'desc')
            ->latest()
            ->get();
        return DataTables::of($upazila)
            ->addIndexColumn()
            ->addColumn('status', function (upazila $upazila) {
                return $upazila->status == 1 ? 'Active' : 'Inactive';
            })

            ->addColumn('state', function (upazila $upazila) {
                return $upazila->DistricName->StateName->name;
            })
            ->addColumn('district', function (upazila $upazila) {
                return $upazila->DistricName->name;
            })

            ->addColumn('action', function ($upazila) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $upazila->id . '" data-bs-toggle="modal" data-bs-target="#upazilamodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $upazila->id . '"><i class="bx bxs-trash"></i></button>';
                if ($upazila->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $upazila->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $upazila->id . '">Inactive</button>';
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
        $upazila = new upazila();
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->status = $request->status;
        if ($upazila->save()) {
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
        $upazila = upazila::with('DistricName.StateName')->find($request->id);
        return response()->json($upazila);
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $upazila = upazila::find($id);
        $upazila->district_id = $request->district_id;
        $upazila->name = $request->name;
        $upazila->status = $request->status;
        if ($upazila->update()) {
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

        $upazila = Upazila::find($id);
        if (!is_null($upazila)) {
            $unions = Union::where('upazila_id', $upazila->id)->get();
            foreach ($unions as $union) {
                if (!is_null($union)) {
                    $areas = area::where('union_id', $union->id)->get();
                    foreach ($areas as $area) {
                        if (!is_null($area)) {
                            $area->delete();
                        }
                    }
                    $taxholders = TaxHolder::where('union_id', $union->id)->get();
                    foreach ($taxholders as $holder) {
                        if (!is_null($holder)) {
                            $holder->delete();
                        }
                    }
                    $users = User::where('union_id', $union->id)->get();
                    foreach ($users as $user) {
                        if (!is_null($user)) {
                            $user->delete();
                        }
                    }
                    $union->delete();
                }
            }
            $upazila->delete();
        }

    }

    public function Active($id)
    {

        $upazila = upazila::find($id);
        $upazila->status = 1;
        if ($upazila->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data successfuly Active',
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

        $upazila = upazila::find($id);
        $upazila->status = 0;
        if ($upazila->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data successfuly Inactive',
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
        $state = Upazila::where('district_id', $id)
            ->get();
        return response()->json($state);

    }
}
