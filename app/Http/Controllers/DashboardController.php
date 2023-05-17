<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Models\Estudiante;

/**
 * Class CarreraController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $carreras = Carrera::paginate();
        $estudiantes = Estudiante::paginate();

        return view('dashboard', compact('estudiantes', 'carreras'));
    }


}