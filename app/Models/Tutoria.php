<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tutoria
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $idProyecto
 * @property $tema
 * @property $observacion
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tutoria extends Model
{
    
    static $rules = [
		'idProyecto' => 'required',
		'tema' => 'required',
		'observacion' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora','idProyecto','tema','observacion','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'idProyecto');
    }
    

}
