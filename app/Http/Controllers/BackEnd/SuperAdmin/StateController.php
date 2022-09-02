<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\district;
use App\Models\state;
use App\Models\TaxHolder;
use App\Models\TaxPayment;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StateController extends Controller
{

    public function index()
    {
        return view('BackEnd.SuperAdmin.state.index');
    }

    public function LoadAll()
    {
        $state = state::orderBy('id', 'desc')
            ->latest()
            ->get();
        return DataTables::of($state)
            ->addIndexColumn()
            ->addColumn('status', function (state $state) {
                return $state->status == 1 ? 'Active' : 'Inactive';
            })

            ->addColumn('action', function ($state) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $state->id . '" data-bs-toggle="modal" data-bs-target="#statemodal"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $state->id . '"><i class="bx bxs-trash"></i></button>';

                if ($state->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $state->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $state->id . '">Inactive</button>';
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
        $state = new state();
        $state->name = $request->name;
        $state->status = $request->status;
        if ($state->save()) {
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
        $state = state::find($request->id);
        return response()->json($state);
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $state = state::find($id);
        $state->name = $request->name;
        $state->status = $request->status;
        if ($state->update()) {
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
        $state = state::find($id);
        if (!is_null($state)) {
            $districts = district::where('state_id', $state->id)->get();
            foreach ($districts as $district) {
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
            $state->delete();
        }
    }

    public function Active($id)
    {

        $state = state::find($id);
        $state->status = 1;
        if ($state->update()) {
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

        $state = state::find($id);
        $state->status = 0;
        if ($state->update()) {
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
    public function GetList()
    {
        $state = state::all();
        return response()->json($state);

    }
}
