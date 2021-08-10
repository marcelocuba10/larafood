<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        //si no encuentra el plan, redirecciona
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        //recupera todos los datos de ese plano especifico
        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', ['plan' => $plan, 'details' => $details]);
    }

    public function show($urlPlan)
    {
        //si no encuentra el plan, redirecciona
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        //recupera todos los datos de ese plano especifico
        //$details = $plan->details();
        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', ['plan' => $plan, 'details' => $details]);
    }

    public function create($urlPlan)
    {
        //si no encuentra el plan, redirecciona
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(Request $request, $urlPlan)
    {
        //si no encuentra el plan, redirecciona
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        //opcion #1
        // $data= $request->all();
        // $data['plan_id']=$plan->id;
        // $this->repository->create($data);

        //opcion #2
        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }
}
