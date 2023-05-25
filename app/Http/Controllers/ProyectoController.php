<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Profesore;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::paginate();

        foreach ($proyectos as $proyecto) {
            $estudiante1 = Estudiante::find($proyecto->idEstudiante_p);
            $estudiante2 = Estudiante::find($proyecto->idEstudiante_p2);
            

            $profesor = Profesore::find($proyecto->idTutor);
            $proyecto->profesor = $profesor->nombre;
        }

        return view('proyecto.index', compact('proyectos'))
            ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto();
        $estudiantes = Estudiante::paginate();
        $profesores = Profesore::paginate();
        return view('proyecto.create', compact('proyecto', 'estudiantes', 'profesores'));
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
            
            'idEstudiante_p' => [
                'required',
                'exists:estudiantes,id',
                function ($attribute, $value, $fail) use ($request) {
                    // Validar si el estudiante ya está relacionado con otro proyecto
                    $existingProject = Proyecto::where(function ($query) use ($value) {
                        $query->where('idEstudiante_p', $value)
                            ->orWhere('idEstudiante_p2', $value);
                    })
                    ->first();
    
                    if ($existingProject) {
                        $fail('El estudiante ya está relacionado con otro proyecto.');
                    }
                },
                function ($attribute, $value, $fail) use ($request) {
                    // Validar si se seleccionó el mismo estudiante en los campos Estudiante 1 y Estudiante 2
                    $estudiante2 = $request->input('idEstudiante_p2');
                    if ($estudiante2 && $value == $estudiante2) {
                        $fail('No se puede seleccionar el mismo estudiante en los campos Estudiante 1 y Estudiante 2.');
                    }
                }
            ],
    
            'idEstudiante_p2' => [
                'nullable',
                'different:idEstudiante_p',
                function ($attribute, $value, $fail) use ($request) {
                    // Validar si el estudiante 2 ya está relacionado con otro proyecto
                    $existingProject = Proyecto::where(function ($query) use ($value) {
                        $query->where('idEstudiante_p', $value)
                            ->orWhere('idEstudiante_p2', $value);
                    })
                    ->first();
    
                    if ($existingProject) {
                        $fail('El estudiante 2 ya está relacionado con otro proyecto.');
                    }
                }
            ]
            
        ]);
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        $estudiante1 = Estudiante::find($proyecto->idEstudiante_p);
        $proyecto->estudiante1 = $estudiante1->nroIdentificacion.' - '.$estudiante1->apellido.' '.$estudiante1->nombre;

        $estudiante2 = Estudiante::find($proyecto->idEstudiante_p2);
        if ($estudiante2) {
            $proyecto->estudiante2 = $estudiante2->nroIdentificacion.' - '.$estudiante2->apellido.' '.$estudiante2->nombre;
        } else {
            $proyecto->estudiante2 = '';
        }

        $profesor = Profesore::find($proyecto->idTutor);
        $proyecto->profesor = $profesor->apellido.' '.$profesor->nombre;

        return view('proyecto.show', compact('proyecto'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $estudiantes = Estudiante::paginate();
        $profesores = Profesore::paginate();
        return view('proyecto.edit', compact('proyecto', 'estudiantes', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {   
        $request->validate([
            'idEstudiante_p' => [
                'required',
                'exists:estudiantes,id',
                function ($attribute, $value, $fail) use ($request, $proyecto) {
                    // Validar si el estudiante ya está relacionado con otro proyecto (excluyendo el proyecto actual)
                    $existingProject = Proyecto::where(function ($query) use ($value, $proyecto) {
                        $query->where('idEstudiante_p', $value)
                            ->orWhere('idEstudiante_p2', $value);
                    })
                    ->where('id', '!=', $proyecto->id)
                    ->first();
    
                    if ($existingProject) {
                        $fail('El estudiante ya está relacionado con otro proyecto.');
                    }
                },
                function ($attribute, $value, $fail) use ($request, $proyecto) {
                    // Validar si se seleccionó el mismo estudiante en los campos Estudiante 1 y Estudiante 2
                    $estudiante2 = $request->input('idEstudiante_p2');
                    if ($estudiante2 && $value == $estudiante2) {
                        $fail('No se puede seleccionar el mismo estudiante en los campos Estudiante 1 y Estudiante 2.');
                    }
                }
            ],
    
            'idEstudiante_p2' => [
                'nullable',
                'different:idEstudiante_p',
                function ($attribute, $value, $fail) use ($request, $proyecto) {
                    // Validar si el estudiante 2 ya está relacionado con otro proyecto (excluyendo el proyecto actual)
                    $existingProject = Proyecto::where(function ($query) use ($value, $request, $proyecto) {
                        $query->where('idEstudiante_p', $value)
                            ->orWhere('idEstudiante_p2', $value);
                    })
                    ->where('id', '!=', $proyecto->id)
                    ->first();
    
                    if ($existingProject) {
                        $fail('El estudiante 2 ya está relacionado con otro proyecto.');
                    }
                }
            ]
        ]);
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto deleted successfully');
    }
}
