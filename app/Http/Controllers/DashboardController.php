<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Coordinadore;
use App\Models\Profesore;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEstudiantes = Estudiante::count();
        $totalCarreras = Carrera::count();
        $totalProfesores = Profesore::count();
        $totalCoordinadores = Coordinadore::count();

        return view('dashboard', compact('totalEstudiantes', 'totalCarreras', 'totalProfesores', 'totalCoordinadores'));
    }
}
