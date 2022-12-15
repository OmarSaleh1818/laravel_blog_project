<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Carbon;


class FooterController extends Controller
{
    public function FooterSetup() {

        $allFooter = Footer::find(1);
        return view('admin.footer.allFooter', compact('allFooter'));

    }

    public function UpdateFooter(Request $request) {

        $footer_id = $request->id;

            Footer::findOrFail($footer_id)->update([
                'number' => $request->number,
                'address' => $request->address,
                'short_description' => $request->short_description,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright
            ]);

            $notification = array(
                'message' => 'Footer Updated Successfuly',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);

    }

}


