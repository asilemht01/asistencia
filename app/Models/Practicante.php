<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Practicante
 *
 * @property $id
 * @property $dni
 * @property $nombre
 * @property $Apellidos
 * @property $correo
 * @property $telefono
 * @property $procedencia
 * @property $carrera
 * @property $oficina_id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Asistencia[] $asistencias
 * @property Oficina $oficina
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Practicante extends Model
{
    
    static $rules = [
		'dni' => 'required|unique:practicantes',
		'nombre' => 'required',
		'Apellidos' => 'required',
		'telefono' => 'required|unique:practicantes',
		'procedencia' => 'required',
		'carrera' => 'required',
		'oficina_id' => 'required',
		'fecha_inicio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni','nombre','Apellidos','correo','telefono','procedencia','carrera','oficina_id','fecha_inicio','fecha_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asistencias()
    {
        return $this->hasMany('App\Models\Asistencia', 'practicante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function oficina()
    {
        return $this->belongsTo('App\Models\Oficina', 'oficina_id', 'id');
    }
    

}
