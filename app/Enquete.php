<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    protected $guarded = array('id', 'updated_at', 'created_at');
    

    public function items() {
        return $this->hasMany('App\Enquete_item');
    }

    public function answers() {
        return $this->hasMany('App\Enquete_answer');
    }
}
