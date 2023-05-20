<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Profesore;
use Illuminate\Http\Request;

/**
 * Class ProfesoreController
 * @package App\Http\Controllers
 */
class ProfesoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesore::paginate();

        foreach ($profesores as $profesore) {
            $profesore->carrera = Carrera::find($profesore->idCarrera)->nombre;
        }

        return view('profesore.index', compact('profesores'))
            ->with('i', (request()->input('page', 1) - 1) * $profesores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        $profesore = new Profesore();
        return view('profesore.create', compact('profesore', 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Profesore::$rules);

        $profesore = Profesore::create($request->all());

        return redirect()->route('profesores.index')
            ->with('success', 'Profesore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesore = Profesore::find($id);
        $profesore->carrera = Carrera::find($profesore->idCarrera)->nombre;
        return view('profesore.show', compact('profesore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesore = Profesore::find($id);
        $carreras = Carrera::all();

        return view('profesore.edit', compact('profesore', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Profesore $profesore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesore $profesore)
    {
        request()->validate(Profesore::$rules);

        $profesore->update($request->all());

        return redirect()->route('profesores.index')
            ->with('success', 'Profesore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $profesore = Profesore::find($id)->delete();

        return redirect()->route('profesores.index')
            ->with('success', 'Profesore deleted successfully');
    }
}
