<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $date
 * @property int $area_01
 * @property int $area_02
 * @property int $area_03
 * @property int $area_04
 * @property int $area_05
 * @property int $area_06
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
    protected $fillable = ['date', 'area_01', 'area_02', 'area_03', 'area_04', 'area_05', 'area_06', 'created_at', 'updated_at'];

}
