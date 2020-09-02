<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user id
     *
     * @param  integer  $value
     * @return string
     */
    public function getUserIdAttribute($value)
    {
        //to fix sqlite returning string value
        return (int) $value;
    }

}
