<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "section";
    protected $primaryKey = 'id_section';
    protected $fillable = ["titre_section","id_prof"];
    
    //relation with cours
    public function cours()
    {
        return $this->hasMany(cours::class, 'id_section');
    }
    //relation with professeur
    public function professeur()
    {
        return $this->belongsTo(professeur::class, 'id_prof');
    }
    //relation with affectation section
    public function affectation_section()
    {
        return $this->hasMany(affectation_section::class, 'id_section')->with('module');
    }
}
