<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'gender'
    ];

    public function books() {
        return $this->hasMany('App\Book');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
