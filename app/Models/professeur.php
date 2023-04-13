<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professeur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "professeur";
    protected $primaryKey = 'id_prof';
    protected $fillable = ["user_prof","specialite"];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_prof');
    }
    public function affectation_mod()
    {
        return $this->hasMany(affectation_prof::class, 'id_prof')->with('module');
    }
}
