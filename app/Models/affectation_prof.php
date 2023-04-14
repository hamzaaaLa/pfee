<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation_prof extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "affectation_prof";
    protected $primaryKey = 'id_affect';
     // Add this line to indicate composite primary key

    protected $fillable = ["id_prof", "id_module"];
    public function professeur()
    {
        return $this->belongsTo(professeur::class, 'id_prof');
    }
    public function module()
    {
        return $this->belongsTo(module::class, 'id_module');
    }
}
