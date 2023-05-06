<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "etudiant";
    protected $primaryKey = 'id_etud';
    protected $fillable = ["cne","filiere","user_etud",];

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
