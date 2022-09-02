<?php

namespace App\Http\Controllers\BackEnd\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use File;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\DataTables;
class AboutUsController extends Controller
{

    public function index()
    {

        return view('BackEnd.SuperAdmin.aboutus.index');
    }

    public function LoadAll(Request $request)
    {
        $aboutus = AboutUs::orderBy('id', 'desc')
            ->latest()
            ->get();
        return Datatables::of($aboutus)
            ->addIndexColumn()

            ->addColumn('status', function (aboutus $aboutus) {
                return $aboutus->status == 1 ? 'Active' : 'Inactive';
            })
            ->addColumn('type', function (aboutus $aboutus) {
                return $aboutus->status == 1 ? 'None' : 'Yes';
            })

            ->addColumn('action', function ($aboutus) {
                $button = ' <div class="btn-group">';
                $button .= '<button  class="btn btn-sm btn-info" id="datashow" data-id="' . $aboutus->id . '" data-bs-toggle="modal" data-bs-target="#categorymodel"><i class="bx bxs-edit"></i></button>';
                $button .= '<button  class="btn btn-sm btn-danger" id="deletedata" data-id="' . $aboutus->id . '"><i class="bx bxs-trash"></i></button>';
                $button .= '</div>';
                return $button;
            })

            ->make(true);
    }
    public function create()
    {
        return view('BackEnd.SuperAdmin.aboutus.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $aboutus = new AboutUs();
        $aboutus->title = $request->title;
        $aboutus->type=$request->type;
        $aboutus->status = $request->status;
        if ($aboutus->save()) {
            Storage::put('/public/AboutUs/about-' . $aboutus->id . '.txt', $request->description);
            Session()->flash('success', 'New About us save successfully');

        } else {
            Session()->flash('erors', 'Fail To save New Page');
        }

        return redirect()->route('aboutuses');

    }

    public function edit($id)
    {

        $aboutus = AboutUs::find($id);
        return view('BackEnd.SuperAdmin.aboutus.edit', compact('aboutus'));

    }
    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $aboutus = AboutUs::find($request->id);
        $aboutus->title = $request->title;
        $aboutus->type=$request->type;
        $aboutus->status = $request->status;
        if ($aboutus->update()) {

            if (File::exists(public_path('storage/AboutUs/about-' . $request->id . '.txt'))) {
                File::delete('storage/AboutUs/about-' . $request->id . '.txt');
            }
            Storage::put('/public/AbputUs/about-' . $request->id . '.txt', $request->description);
            Session()->flash('success', 'About Us Upadte successfully');

        } else {
            Session()->flash('erors', 'Fail To update New Page');
        }

        return redirect()->route('aboutuses');

    }

    public function destroy($id)
    {

        $aboutus = AboutUs::find($id);
        if (!is_null($aboutus)) {
            
            if (File::exists(public_path('storage/page/page-' . $aboutus->id . '.txt'))) {
                File::delete('storage/page/page-' . $aboutus->id . '.txt');
            }
     
            $aboutus->delete();

        }
    }

    
}
