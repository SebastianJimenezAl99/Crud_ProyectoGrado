<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $evidencia
 * @property $idEstudiante_p
 * @property $idEstudiante_p2
 * @property $idTutor
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Calificacion[] $calificacions
 * @property Estudiante $estudiante
 * @property Estudiante $estudiante
 * @property Profesore $profesore
 * @property Sustentacion $sustentacion
 * @property Tutoria[] $tutorias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'evidencia' => 'required',
		'idEstudiante_p' => 'required',
		'idTutor' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','evidencia','idEstudiante_p','idEstudiante_p2','idTutor','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificacions()
    {
        return $this->hasMany('App\Models\Calificacion', 'idProyecto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'idEstudiante_p2');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante2()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'idEstudiante_p');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profesore()
    {
        return $this->hasOne('App\Models\Profesore', 'id', 'idTutor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sustentacion()
    {
        return $this->hasOne('App\Models\Sustentacion', 'idProyecto', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tutorias()
    {
        return $this->hasMany('App\Models\Tutoria', 'idProyecto', 'id');
    }
    

}
