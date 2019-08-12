<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Formation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     *
     @var array
     */
    protected $guarded = ['id'];

    public $fillable = ['title','start' , 'end' , 'color'];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formations';


    public function categorie(){
       return  $this->belongsTo('App\Categorie', 'id_categorie','id_categorie');
    }

     public function formateur(){
       return  $this->belongsTo('App\Formateur');
    }

    public function inscriptions(){
        return $this->hasMany('App\Inscription', 'id_formation', 'id');
    }

     public function tags(){
        return $this->belongsToMany('App\tag');

    }
}
