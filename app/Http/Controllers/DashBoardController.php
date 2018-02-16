<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    function index(){
    	return view('dashboard.index');
    }
}
