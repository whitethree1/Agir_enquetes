<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquete_archive extends Model
{
    protected $guarded = array('id', 'updated_at', 'created_at');

    public function item() {
        return $this->hasOne('App\Enquete_item', 'id', 'item_id');
    }
}
