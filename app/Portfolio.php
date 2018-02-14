<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title', 'text', 'customer','alias','img', 'filter-alias'];
    public function filter() {
        return $this->belongsTo('App\Filter','filter_alias','alias');
    }

}
