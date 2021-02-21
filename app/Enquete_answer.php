<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquete_answer extends Model
{
    protected $guarded = array('id', 'updated_at', 'created_at');

    public function archives() {
        return $this->hasMany('App\Enquete_archive', 'answer_id');
    }

    public function enquete() {
        return $this->belongsTo('App\Enquete');
    }
}
