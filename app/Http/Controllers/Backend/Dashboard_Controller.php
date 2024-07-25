<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Controller extends Controller
{
     public function index(){
        return view('Backend.master');
     }
}
