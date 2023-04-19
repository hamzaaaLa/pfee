<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation_semestre extends Model
{
    use HasFactory;
    protected $table = "affectation_semestre";
    protected $primaryKey = 'id_affect';
    protected $fillable = ["id_semestre", "id_etud"];
    public $timestamps = false;

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'id_etud');
    }
}
