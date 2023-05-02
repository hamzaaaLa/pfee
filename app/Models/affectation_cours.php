<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation_cours extends Model
{
    use HasFactory;
    protected $table = "affectation_cours";
    protected $primaryKey = 'id_affect';
    protected $fillable = ["id_section","id_cour"];
    public $timestamps = false;
    
    //relation with cour || section
    public function section()
    {
        return $this->belongsTo(section::class, 'id_section');
    }
    public function cours()
    {
        return $this->belongsTo(cours::class, 'id_cour');
    }


}
