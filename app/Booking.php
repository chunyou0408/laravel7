<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $area_id
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 */
class Booking extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id','name', 'phone', 'email', 'area_id', 'date', 'created_at', 'updated_at'];

    public function areaType()
    {
        return $this->hasOne('App\AreaType','id','area_id');
    }

    public function user()
    {    
        return $this->hasOne('App\User','id','user_id');
    }

}
