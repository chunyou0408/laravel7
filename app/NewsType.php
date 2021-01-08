<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class NewsType extends Model
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
    protected $fillable = ['name', 'created_at', 'updated_at'];

    public function newss()
    {
        //return $this->hasOne('model名稱','對方與自己關聯的欄位','自己與對方關聯的欄位');
        //              hasMany
        //belongsTo('Model名稱','自己','對方');

        return $this->hasMany('App\News','type_id','id');
    }

}
