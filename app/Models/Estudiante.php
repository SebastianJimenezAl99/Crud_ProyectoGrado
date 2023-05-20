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
 * @property $idCarrera
 * @property $semestre
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrera $carrera
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
		'idCarrera' => 'required',
		'semestre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nroIdentificacion','tipoIdentificacion','nombre','apellido','email','telefono','idCarrera','semestre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrera()
    {
        return $this->hasOne('App\Models\Carrera', 'id', 'idCarrera');
    }
    

}
