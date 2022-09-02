<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\area;
use App\Models\TaxHolder;
use App\Models\TaxPayment;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnionController extends Controller
{
    public function index()
    {
        return view('BackEnd.SuperAdmin.union.index');
    }

    public function LoadAll()
    {
        $Union = Union::orderBy('id', 'desc')
            ->latest()
            ->get();
        return DataTables::of($Union)
            ->addIndexColumn()
            ->addColumn('status', function (Union $Union) {
                return $Union->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('state', function (Union $Union) {
                return $Union->UpazilaName->DistricName->StateName->name;
            })
            ->addColumn('district', function (Union $Union) {
                return $Union->UpazilaName->DistricName->name;
            })
            ->addColumn('upazila', function (Union $Union) {
                return $Union->UpazilaName->name;
            })
            ->addColumn('action', function ($Union) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $Union->id . '" data-bs-toggle="modal" data-bs-target="#unionmodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $Union->id . '"><i class="bx bxs-trash"></i></button>';

                if ($Union->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $Union->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $Union->id . '">Inactive</button>';
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
        $Union = new Union();
        $Union->upazila_id = $request->upazila_id;
        $Union->name = $request->name;
        $Union->status = $request->status;
        if ($Union->save()) {
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
        $Union = Union::with('UpazilaName.DistricName.StateName')->find($request->id);
        return response()->json($Union);
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

        $id = $request->id;
        $Union = Union::find($id);
        $Union->upazila_id = $request->upazila_id;
        $Union->name = $request->name;
        $Union->status = $request->status;
        $Union->title = $request->title;
        $Union->address = $request->address;
        $Union->email = $request->email;
        $Union->phone = $request->phone;
        if ($Union->update()) {
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

        $union = Union::find($id);
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

    public function Active($id)
    {

        $Union = Union::find($id);
        $Union->status = 1;
        if ($Union->update()) {
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

        $Union = Union::find($id);
        $Union->status = 0;
        if ($Union->update()) {
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
        $state = Union::where('upazila_id', $id)
            ->get();
        return response()->json($state);

    }

    public function Adminupdate(Request $request)
    {

        $id = $request->id;
        $Union = Union::find($id);
        $Union->title = $request->title;
        $Union->address = $request->address;
        $Union->email = $request->email;
        $Union->phone = $request->phone;
        if ($Union->update()) {
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
}