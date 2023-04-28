<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "module";
    protected $primaryKey = 'id_module';
    protected $fillable = ["libelleModule","semester","id_filiere"];
    protected $dates = [
        'dernierAcces'
    ];

    //relation between filiere|module
    public function filiere()
    {
        return $this->belongsTo(filiere::class, 'id_filiere');
    }
    //relation with annonce 
    public function Annonce()
    {
        return $this->hasMany(Annonce::class, 'id_module');
    }
    
    //relation between affectation_prof|module
    public function affectation_prof()
    {
        return $this->hasMany(affectation_prof::class, 'id_module')->with('professeur');
    }

    public function affectation_mod()
    {
        return $this->hasMany(affectation_semestre::class, 'id_module')->with('etudiant');
    }

    //relation with cours
    public function cours()
    {
        return $this->hasMany(cours::class, 'id_module');
    }
    //relation with section & affectation_section
    public function affectation_section()
    {
        return $this->hasMany(affectation_section::class, 'id_module')->with('section');
    }
    //relation with posts
    public function posts()
    {
        return $this->hasMany(posts::class,'id_module');
    }
    //images
    public function getModuleImageUrlAttribute(): string
    {
        $filename = $this->attributes['imageModule'];
        $url = asset('img/module.png');
    
      
    
        return $url;
    }
}
