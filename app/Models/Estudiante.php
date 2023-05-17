<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 *
 * @property $id
 * @property $nroIdentificacion
 * @property $tipoIdentificacion
 * @property $nombre
 * @property $apellido
 * @property $email
 * @property $telefono
 * @property $semestre
 * @property $idCarrera
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estudiante extends Model
{
    
    static $rules = [
		'nroIdentificacion' => 'required',
		'tipoIdentificacion' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'semestre' => 'required',
		'idCarrera' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nroIdentificacion','tipoIdentificacion','nombre','apellido','email','telefono','semestre','idCarrera'];



}
