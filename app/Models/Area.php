<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @property $id
 * @property $nombrearea
 * @property $created_at
 * @property $updated_at
 *
 * @property Oficina[] $oficinas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Area extends Model
{
    
    static $rules = [
		'nombrearea' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrearea'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oficinas()
    {
        return $this->hasMany('App\Models\Oficina', 'area_id', 'id');
    }
    

}
