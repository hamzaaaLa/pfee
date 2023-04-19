<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;

    protected $table = "etudiant";
    protected $primaryKey = 'id_etud';
    protected $fillable = ["cne","filiere","user_etud",];
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_etud');
    }


    public function affectation_semestre()
    {
        return $this->hasMany(affectation_semestre::class, 'id_etud')->with('semestre');
    }

    public function affectation_etud()
    {
        return $this->hasMany(affectation_etud::class, 'id_etud')->with('module');
    }


}
