<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class FrontPageController extends Controller
{

    public function contactUs()
    {
        return view('FrontEnd.pages.contactus');
    }

    public function AboutUs()
    {
        $aboutuses = AboutUs::where('status', 1)->get();
        return view('FrontEnd.pages.aboutus', compact('aboutuses'));
    }

    public function ContactUsStore(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required|MIN:50',
        ]);
        $contactus=new ContactUs();
        $contactus->name=$request->name;
        $contactus->phone=$request->phone;
        $contactus->email=$request->email;
        $contactus->message=$request->message;
        if ($contactus->save()) {
            Session()->flash('success', 'Your Message Send Successfully');
        } else {
            Session()->flash('erors', 'Fail To sent message!Try Again');
        }
        return redirect()->route('front.page.contactus');

    }

}