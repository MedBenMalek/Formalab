<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categorie extends Model
{

	protected $primaryKey = 'id_categorie';
    
    public $fillable = ['titre_categorie'];

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
                'source' => 'titre_categorie'
            ]
        ];
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id_categorie'];


    public function formations(){
        return $this->hasMany('App\Formation','id_categorie', 'id_categorie');

    }
}
