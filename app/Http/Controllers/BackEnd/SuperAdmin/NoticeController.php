<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\menu;
use App\Models\Notice;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Storage;
use File;
class NoticeController extends Controller
{
    public function index()
    {

        return view('BackEnd.SuperAdmin.Notice.index');
    }

    public function LoadAll(Request $request)
    {
        $Notice = Notice::orderBy('id', 'desc')
            ->latest()
            ->get();
        return Datatables::of($Notice)
            ->addIndexColumn()

            ->addColumn('status', function (Notice $Notice) {
                return $Notice->status == 1 ? 'Active' : 'Inactive';
            })

            ->addColumn('action', function ($Notice) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $Notice->id . '" data-bs-toggle="modal" data-bs-target="#categorymodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $Notice->id . '"><i class="bx bxs-trash"></i></button>';
                $button .= '</div>';
                return $button;
            })

            ->make(true);
    }
    public function create()
    {
        return view('BackEnd.SuperAdmin.Notice.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);
        $Notice = new Notice();
        $Notice->title = $request->title;
        $Notice->status = $request->status;
        $Notice->date = $request->date;
        if ($Notice->save()) {
            Storage::put('/public/Notice/notice-' . $Notice->id . '.txt', $request->description);
            Session()->flash('success', 'New Notice save successfully');

        } else {
            Session()->flash('erors', 'Fail To save New Page');
        }

        return redirect()->route('notices');

    }

    public function edit($id)
    {

        $Notice = Notice::find($id);
        return view('BackEnd.SuperAdmin.Notice.edit', compact('Notice'));

    }
    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);
        $Notice = Notice::find($request->id);
        $Notice->title = $request->title;
        $Notice->date = $request->date;
        $Notice->status = $request->status;
        if ($Notice->update()) {

            if (File::exists(public_path('storage/Notice/notice-' . $request->id . '.txt'))) {
                File::delete('storage/Notice/notice-' . $request->id . '.txt');
            }
            Storage::put('/public/Notice/notice-' . $request->id . '.txt', $request->description);
            Session()->flash('success', 'Notice Upadte successfully');

        } else {
            Session()->flash('erors', 'Fail To update Notice');
        }
        return redirect()->route('notices');

    }

    public function destroy($id)
    {

        $Notice = Notice::find($id);
        if (!is_null($Notice)) {
            
            if (File::exists(public_path('storage/Notice/notice-' . $Notice->id . '.txt'))) {
                File::delete('storage/Notice/notice-' . $Notice ->id . '.txt');
            }
        
            $Notice->delete();

        }
    }

}
