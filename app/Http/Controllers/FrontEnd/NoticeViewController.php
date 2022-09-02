<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeViewController extends Controller
{
    public function index()
    {  
        
        $NoticesTitle=Notice::where('status',1)
        ->orderBy('id', 'desc')
        ->paginate(15); 
        return view('FrontEnd.Notice.index',compact('NoticesTitle'));

    }

    public function NoticeDetails($id){

        $Notice=Notice::find($id);
        $NoticesTitle=Notice::where('status',1)->get();
        return view('FrontEnd.Notice.details',compact('Notice','NoticesTitle'));
    }
}