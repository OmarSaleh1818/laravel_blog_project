<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Carbon;

class ServicesController extends Controller
{

    public function allServices() {

        $allServices = Services::find(1);
        return view('admin.services.all_services', compact('allServices'));

    }

    public function HomeServices() {

        $allServices = Services::find(1);
        return view('frontend.services', compact('allServices'));

    }

}
