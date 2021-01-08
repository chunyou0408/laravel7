<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = 'product_types';
    protected $fillable = ['name'];

    public function products()
    {
        //return $this->hasOne('model名稱','對方與自己關聯的欄位','自己與對方關聯的欄位');
        //              hasMany 
        //belongsTo('Model名稱','自己','對方');
        
        return $this->hasMany('App\Product','type_id','id');
    }
}
