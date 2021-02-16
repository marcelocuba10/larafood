<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $title = "Plans";
        $plans = $this->repository->latest()->paginate(5);
        //return view('admin.pages.plans.index', ['plans' => $plans]);
        return view('admin.pages.plans.index', compact('plans', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
