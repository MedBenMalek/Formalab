<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $primaryKey = 'id_inscription';

    protected $guarded = ['id_inscription'];

    public function formation(){
       return  $this->belongsTo('App\Formation');
    }
}
