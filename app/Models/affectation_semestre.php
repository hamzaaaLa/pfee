<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation_semestre extends Model
{
    use HasFactory;

    protected $table = "affectation_semestre";
    protected $primaryKey = 'id_affect';
    public $incrementing = false; // Add this line to indicate composite primary key
    protected $keyType = 'int'; // Add this line to specify primary key type

    protected $fillable = ["id_semestre", "id_etud"];

    public function semestre()
    {
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

    public function etudiant()
    {
        return $this->belongsTo(etudiant::class, 'id_etud');
    }
}
