<?php

namespace App\Http\Controllers;

use App\Models\Sustentacion;
use App\Models\Proyecto;
use App\Models\Profesore;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class SustentacionController
 * @package App\Http\Controllers
 */
class SustentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sustentacions = Sustentacion::paginate();

        foreach ($sustentacions as $sustentacion) {
            $proyecto = Proyecto::find($sustentacion->idProyecto);
            $sustentacion->proyecto = $proyecto;

        }

        return view('sustentacion.index', compact('sustentacions'))
            ->with('i', (request()->input('page', 1) - 1) * $sustentacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sustentacion = new Sustentacion();
        $proyectos = Proyecto::all();
        $profesores = Profesore::all();
        return view('sustentacion.create', compact('sustentacion', 'proyectos','profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idJurado1' => 'different:idJurado2',
            'idJurado2' => 'different:idJurado1',
            'idProyecto' => [
                Rule::unique('sustentacions')->where(function ($query) use ($request) {
                    return $query->where('idProyecto', $request->idProyecto);
                }),
            ],
        ], [
            'idProyecto.unique' => 'El proyecto ya tiene programada una sustentación.',
        ]);
        request()->validate(Sustentacion::$rules);

        $sustentacion = Sustentacion::create($request->all());

        return redirect()->route('sustentacions.index')
            ->with('success', 'Sustentacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sustentacion = Sustentacion::find($id);
        $proyecto = Proyecto::find($sustentacion->idProyecto);
        $sustentacion->proyecto = $proyecto->id.' - '.$proyecto->titulo;

        $profesor1 = Profesore::find($sustentacion->idJurado1);
        $profesor2 = Profesore::find($sustentacion->idJurado2);

        $sustentacion->jurado1 =$profesor1->apellido.' '.$profesor1->nombre;
        $sustentacion->jurado2 =$profesor2->apellido.' '. $profesor2->nombre;

        return view('sustentacion.show', compact('sustentacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sustentacion = Sustentacion::find($id);
        $proyectos = Proyecto::all();
        $profesores = Profesore::all();
        
        return view('sustentacion.edit',  compact('sustentacion', 'proyectos','profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sustentacion $sustentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sustentacion $sustentacion)
    {
        $request->validate([
            'idJurado1' => 'different:idJurado2',
            'idJurado2' => 'different:idJurado1',
            'idProyecto' => [
                Rule::unique('sustentacions')->where(function ($query) use ($request) {
                    return $query->where('idProyecto', $request->idProyecto);
                }),
            ],
        ], [
            'idProyecto.unique' => 'El proyecto ya tiene programada una sustentación.',
        ]);
        request()->validate(Sustentacion::$rules);

        $sustentacion->update($request->all());

        return redirect()->route('sustentacions.index')
            ->with('success', 'Sustentacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sustentacion = Sustentacion::find($id)->delete();

        return redirect()->route('sustentacions.index')
            ->with('success', 'Sustentacion deleted successfully');
    }
}


