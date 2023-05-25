<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sustentacion
 *
 * @property $id
 * @property $fecha
 * @property $hora
 * @property $idProyecto
 * @property $idJurado1
 * @property $idJurado2
 * @property $comentario
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Profesore $profesore
 * @property Profesore $profesore
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sustentacion extends Model
{
    
    static $rules = [
		'idProyecto' => 'required',
		'idJurado1' => 'required',
		'idJurado2' => 'required',
		'comentario' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','hora','idProyecto','idJurado1','idJurado2','comentario','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesore2()
    {
        return $this->hasOne('App\Models\Profesore', 'id', 'idJurado2');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesore()
    {
        return $this->hasOne('App\Models\Profesore', 'id', 'idJurado1');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'idProyecto');
    }
    

}
