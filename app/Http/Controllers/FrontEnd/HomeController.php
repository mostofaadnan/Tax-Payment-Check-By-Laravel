<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\area;
use App\Models\district;
use App\Models\Notice;
use App\Models\state;
use App\Models\Union;
use App\Models\Upazila;

class HomeController extends Controller
{
    public function index()
    {
     
        $NoticesTitle = Notice::where('status', 1)
        ->orderBy('id', 'desc')
        ->paginate(15); 
        $aboutus=AboutUs::where('type',2)
        ->where('status',1)
        ->get();

        $unions = Union::where('status', 1)->get();
        return view('FrontEnd/Home/index', compact('unions','NoticesTitle','aboutus'));
    }

    public function StateList()
    {
        $state = state::where('status', 1)->get();
        return response()->json($state);
    }
    public function DistrictList($id)
    {
        $state = district::where('state_id', $id)
            ->get();
        return response()->json($state);

    }
    public function UpazilaList($id)
    {
        $state = Upazila::where('district_id', $id)
            ->get();
        return response()->json($state);

    }
    public function UnionList($id)
    {
        $state = Union::where('upazila_id', $id)
            ->get();
        return response()->json($state);

    }
    public function AreaList($id)
    {
        $area = area::where('union_id', $id)
            ->get();
        return response()->json($area);

    }

    public function GetNoticeList(){
        $Notices = Notice::select('title','id')->where('status', 1)->pluck("title", "id");
        return response()->json($Notices);

    }
}