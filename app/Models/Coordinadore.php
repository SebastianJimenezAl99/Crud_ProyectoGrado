<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coordinadore
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $apellido
 * @property $email
 * @property $telefono
 * @property $idCarrera
 * @property $created_at
 * @property $updated_at
 *
 * @property Carrera $carrera
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coordinadore extends Model
{
    
    static $rules = [
		'cedula' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'idCarrera' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombre','apellido','email','telefono','idCarrera'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carrera()
    {
        return $this->hasOne('App\Models\Carrera', 'id', 'idCarrera');
    }
    

}
