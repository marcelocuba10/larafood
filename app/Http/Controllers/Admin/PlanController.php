<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Support\Str;


class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function home()
    {
        return view('admin.pages.dashboard');
    }

    public function index()
    {
        $title = "Plans";
        //$plans = $this->repository->all();
        $plans = $this->repository->latest()->paginate(5);
        //return view('admin.pages.plans.index', ['plans' => $plans]);

        return view('admin.pages.plans.index', compact('plans', 'title'))
            ->with('i', (request()->input('page', 1) - 1) * 1);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    //salvar datos
    public function store(StoreUpdatePlan $request) //StoreUpdatePlan valida datos, funcion alojada en http/request/
    {
        //  dd($request->all());
        $data = $request->all();
        $data['url'] = Str::kebab($request->name); //kebab case reemplaza los espacios entre palabras con un guión.
        //$request->status = 1;
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //first retorna un unico registro, get retorna una coleccion ; find recupera por ID
        if (empty($plan)) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', ['plan' => $plan]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first(); //consulta la url en la db y devuelve un unico valor
        if (empty($plan)) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, $url)
    { //$request es un objeto

        $plan = $this->repository->where('url', $url)->first();

        if (empty($plan)) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function delete($url)
    {

        $plan = $this->repository->where('url', $url)->first();

        if (empty($plan)) {
            return redirect()->back();
        }

        $plan->delete();

        return redirect()
            ->route('plans.index')
            ->with('message', 'Registro eliminado con exito');
    }

    public function search(Request $request)
    {

        $filters = $request->all(); //traer todos los datos
        $filters = $request->except('_token'); //excluir un campo
        $plans = $this->repository->search($request->filter); //envio el valor de filter a mi funcion search en model/plan

        return view('admin.pages.plans.index', ['plans' => $plans, 'filters' => $filters]); //muestro los resultados


    }
}
