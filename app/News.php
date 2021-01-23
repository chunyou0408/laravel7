<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $type_id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 */
class News extends Model
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
    protected $fillable = ['type_id', 'title', 'content', 'date', 'img', 'created_at', 'updated_at'];

    public function newsType()
    {
        return $this->hasOne('App\NewsType','id','type_id');
    }

}
