<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
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
    //images
    public function getImageModuleAttribute($value)
    {
        return base64_encode($value);
    }

    public function setImageModuleAttribute($value)
    {
        $this->attributes['imageModule'] = base64_decode($value);
    }
    public $timestamps = false;
    
}
