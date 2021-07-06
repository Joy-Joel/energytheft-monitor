<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RTUDevice;
use App\Logs;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $houseData= RTUDevice::all();

     // Load index view
     return view('home')->with("houseData",$houseData);
    }
}
