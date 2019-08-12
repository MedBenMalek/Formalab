<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
   public function formations(){
        return $this->hasMany('App\Formation', 'id_formation', 'id');

    }
}
