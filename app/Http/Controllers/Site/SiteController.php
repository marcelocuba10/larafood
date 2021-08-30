<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class SiteController extends Controller
{
    public function index(){

        $plans = Plan::with('details')->orderBy('price', 'ASC')->get(); //traigo los planes con sus detalles

        return view('site.index', compact('plans'));
    }
}
