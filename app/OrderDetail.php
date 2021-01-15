<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $product_id
 * @property int $order_id
 * @property string $name
 * @property int $price
 * @property int $qty
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class OrderDetail extends Model
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
    protected $fillable = ['product_id', 'order_id', 'name', 'price', 'qty', 'img', 'created_at', 'updated_at'];

}
