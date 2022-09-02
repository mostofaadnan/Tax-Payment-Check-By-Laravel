<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\district;
use App\Models\TaxHolder;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DistrictController extends Controller
{
    public function index()
    {
        return view('BackEnd.SuperAdmin.district.index');
    }

    public function LoadAll()
    {
        $district = district::orderBy('state_id', 'DESC')
            ->latest()
            ->get();
        return DataTables::of($district)
            ->addIndexColumn()
            ->addColumn('status', function (district $district) {
                return $district->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('state', function (district $district) {
                return $district->StateName->name;
            })

            ->addColumn('action', function ($district) {
                $button = ' <div class="btn-group">';

                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $district->id . '" data-bs-toggle="modal" data-bs-target="#districtmodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $district->id . '"><i class="bx bxs-trash"></i></button>';
                if ($district->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $district->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $district->id . '">Inactive</button>';
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
        $district = new district();
        $district->state_id = $request->state_id;
        $district->name = $request->name;
        $district->status = $request->status;
        if ($district->save()) {
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
        $district = district::find($request->id);
        return response()->json($district);
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $district = district::find($id);
        $district->state_id = $request->state_id;
        $district->name = $request->name;
        $district->status = $request->status;
        if ($district->update()) {
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

        $district = district::find($id);
        if (!is_null($district)) {
            $upazilas = Upazila::where('district_id', $district->id)->get();
            foreach ($upazilas as $upazila) {
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
            $district->delete();
        }

    }

    public function Active($id)
    {

        $district = district::find($id);
        $district->status = 1;
        if ($district->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'State Active Successfuly',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Fail toState Active',
            ]);
        }
    }
    public function InActive($id)
    {

        $district = district::find($id);
        $district->status = 0;
        if ($district->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'State In-Active Successfuly',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Fail toState In-Active',
            ]);
        }
    }
    public function GetList($id)
    {
        $state = district::where('state_id', $id)
            ->get();
        return response()->json($state);

    }
}
