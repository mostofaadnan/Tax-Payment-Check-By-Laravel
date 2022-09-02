<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;

class UnionUserController extends Controller
{
    public function index()
    {
        return view('BackEnd.SuperAdmin.unionuser.index');
    }
    public function create()
    {

        return view('BackEnd.SuperAdmin.unionuser.create');
    }

    public function LoadAll()
    {
        $User = User::orderBy('id', 'desc')->latest()
            ->get();
        return Datatables::of($User)
            ->addIndexColumn()
            ->addColumn('status', function ($User) {
                return $User->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('state', function (User $User) {
                return $User->UnionName->UpazilaName->DistricName->StateName->name;
            })
            ->addColumn('district', function (User $User) {
                return $User->UnionName->UpazilaName->DistricName->name;
            })
            ->addColumn('upazila', function (User $User) {
                return $User->UnionName->UpazilaName->name;
            })
            ->addColumn('union', function (User $User) {
                return $User->UnionName->name;
            })
            ->addColumn('action', function ($User) {
                $button = ' <div class="btn-group">';
                $button .= '<a href="' . route('unionuser.edit', $User->id) . '" class="btn btn-sm btn-info" id="datashow" data-id="' . $User->id . '"><i class="bx bxs-edit"></i></a>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $User->id . '"><i class="bx bxs-trash"></i></button>';
                if ($User->status == 1) {
                    $button .= '<button  class="btn btn-sm btn-success" id="inactive" data-id="' . $User->id . '">Active</button>';
                } else {
                    $button .= '<button  class="btn btn-sm btn-warning" id="active" data-id="' . $User->id . '">Inactive</button>';
                }
                $button .= '</div>';
                return $button;
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|same:password_confirmation',
            'union_id' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        Session()->flash('success', 'New User Has been Insert successfully');
        return redirect()->route('unionusers');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('BackEnd.SuperAdmin.unionuser.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'same:password_confirmation',
            'union_id' => 'required',
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        
        $user = User::find($id);
        if ($user->email != $input['email']) {
            $user->newEmail($input['email']);
        }
        $user->update($input);
        Session()->flash('success', 'User Information Update successfully');
        return redirect()->route('unionusers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function Active($id)
    {

        $Union = User::find($id);
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

        $Union = User::find($id);
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
}
