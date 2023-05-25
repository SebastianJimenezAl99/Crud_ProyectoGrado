<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Coordinadore;
use App\Models\Profesore;
use App\Models\Proyecto;
use App\Models\Calificacion;
use App\Models\Tutoria;
use App\Models\Sustentacion;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEstudiantes = Estudiante::count();
        $totalCarreras = Carrera::count();
        $totalProfesores = Profesore::count();
        $totalCoordinadores = Coordinadore::count();
        $totalProyectos = Proyecto::count();
        $totalCalificaciones = Calificacion::count();
        $totalTutorias = Tutoria::count();
        $totalSustentaciones = Sustentacion::count();

        return view('dashboard', compact(
            'totalEstudiantes',
            'totalCarreras',
            'totalProfesores',
            'totalCoordinadores',
            'totalProyectos',
            'totalCalificaciones',
            'totalTutorias',
            'totalSustentaciones'
        ));
    }
}

