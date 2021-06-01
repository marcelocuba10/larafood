<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Support\Str;


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

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $request->status = 1;
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //first retorna un unico registro
        if (empty($plan)) {
            return redirect()->back();
        }
        
        return view('admin.pages.plans.show', ['plan' => $plan]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //first retorna un unico registro
        if (empty($plan)) {
            return redirect()->back();
        }
        
        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request , $url){ //$request es un objeto

        $plan = $this->repository->where('url',$url)->first();

        if (empty($plan)) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');

    }

}
