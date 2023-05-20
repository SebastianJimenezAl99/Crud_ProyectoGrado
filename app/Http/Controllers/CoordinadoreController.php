<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Coordinadore;
use Illuminate\Http\Request;

/**
 * Class CoordinadoreController
 * @package App\Http\Controllers
 */
class CoordinadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinadores = Coordinadore::paginate();

        foreach ($coordinadores as $coordinadore) {
            $coordinadore->carrera = Carrera::find($coordinadore->idCarrera)->nombre;
        }

        return view('coordinadore.index', compact('coordinadores'))
            ->with('i', (request()->input('page', 1) - 1) * $coordinadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $carreras = Carrera::all();
        $coordinadore = new Coordinadore();
        return view('coordinadore.create', compact('coordinadore','carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coordinadore::$rules);

        $coordinadore = Coordinadore::create($request->all());

        return redirect()->route('coordinadores.index')
            ->with('success', 'Coordinadore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinadore = Coordinadore::find($id);
        $coordinadore->carrera = Carrera::find($coordinadore->idCarrera)->nombre;
        return view('coordinadore.show', compact('coordinadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordinadore = Coordinadore::find($id);
        $carreras = Carrera::all();
        
        return view('coordinadore.edit', compact('coordinadore','carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coordinadore $coordinadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinadore $coordinadore)
    {
        request()->validate(Coordinadore::$rules);

        $coordinadore->update($request->all());

        return redirect()->route('coordinadores.index')
            ->with('success', 'Coordinadore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coordinadore = Coordinadore::find($id)->delete();

        return redirect()->route('coordinadores.index')
            ->with('success', 'Coordinadore deleted successfully');
    }
}
