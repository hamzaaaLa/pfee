<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semestre extends Model
{
    use HasFactory;
    protected $table = "semestre";
    protected $primaryKey = 'id_semestre';
    
    protected $fillable = ["libelleSemestre"];
    
    public function affectation()
    {
        return $this->hasMany(affectation_semestre::class, 'id_semestre')->with('etudiant');
    }
   
}
