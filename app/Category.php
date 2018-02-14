<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'alias', 'parent_id'];

    public function articles() {
        return $this->hasMany('App\Articles');
    }
}
