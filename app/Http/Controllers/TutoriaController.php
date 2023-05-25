<?php

namespace App\Http\Controllers;

use App\Models\Tutoria;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Validation\Rule;

/**
 * Class TutoriaController
 * @package App\Http\Controllers
 */
class TutoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorias = Tutoria::paginate();

        foreach ($tutorias as $tutoria) {
            $tutoria->proyecto = Proyecto::find($tutoria->idProyecto);
        }

        return view('tutoria.index', compact('tutorias'))
            ->with('i', (request()->input('page', 1) - 1) * $tutorias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutoria = new Tutoria();
        $proyectos = Proyecto::all();
        return view('tutoria.create', compact('tutoria', 'proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => [
                'required',
                'date',
                'after_or_equal:today',
                Rule::unique('tutorias')->where(function ($query) use ($request) {
                    return $query->where('hora', $request->hora);
                })
            ],
            'hora' => [
                'required',
                'date_format:H:i',
                Rule::unique('tutorias')->where(function ($query) use ($request) {
                    return $query->where('fecha', $request->fecha);
                })
            ],
            'idProyecto' => 'required',
            'tema' => 'required',
            'observacion' => 'required',
            'estado' => 'required',
        ]);
        request()->validate(Tutoria::$rules);

        $tutoria = Tutoria::create($request->all());

        return redirect()->route('tutorias.index')
            ->with('success', 'Tutoria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutoria = Tutoria::find($id);

        $proyecto = Proyecto::find($tutoria->idProyecto);
        $tutoria->proyecto =$proyecto->id.' - '.$proyecto->titulo;

        return view('tutoria.show', compact('tutoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutoria = Tutoria::with('proyecto')->find($id);
        $proyectos = Proyecto::all();
        return view('tutoria.edit', compact('tutoria', 'proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tutoria $tutoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutoria $tutoria)
    {
        $validatedData = $request->validate([
            'fecha' => [
                'required',
                'date',
                'after_or_equal:today',
                Rule::unique('tutorias')->ignore($tutoria->id)->where(function ($query) use ($request) {
                    return $query->where('hora', $request->hora);
                })
            ],
            'hora' => [
                'required',
                'date_format:H:i',
                Rule::unique('tutorias')->ignore($tutoria->id)->where(function ($query) use ($request) {
                    return $query->where('fecha', $request->fecha);
                })
            ],
            'idProyecto' => 'required',
            'tema' => 'required',
            'observacion' => 'required',
            'estado' => 'required',
        ]);
        request()->validate(Tutoria::$rules);

        $tutoria->update($request->all());

        return redirect()->route('tutorias.index')
            ->with('success', 'Tutoria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tutoria = Tutoria::find($id)->delete();

        return redirect()->route('tutorias.index')
            ->with('success', 'Tutoria deleted successfully');
    }
}

