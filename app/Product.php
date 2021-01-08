<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name','type_id','price','description','img'];

    public function productType()
    {
        return $this->hasOne('App\ProductType','id','type_id');
    }
}
