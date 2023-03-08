<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficina
 *
 * @property $id
 * @property $nombreoficina
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Oficina extends Model
{
    
    static $rules = [
		'nombreoficina' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombreoficina','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area_id', 'id');
    }
    public function practicante()
    {
        return $this->hasMany('App\Models\Practicante', 'practicante_id', 'id');
    }
    

}
