<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Actualite extends Model
{
	protected $primaryKey = 'id_actualite';
    public $fillable = ['titre_actualite','description_actualite'];

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
                'source' => 'titre_actualite'
            ]
        ];
    }

    protected $guarded = ['id_actualite'];

    public function formateur(){
       return  $this->belongsTo('App\Formateur', 'id_formateur', 'id');
   }

    public function admin(){
       return  $this->belongsTo('App\Admin', 'id_admin', 'id');
   }

   public function tags(){
       return  $this->belongsToMany('App\tag');
   }
}