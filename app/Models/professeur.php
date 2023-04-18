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
    //relation between profeseur and user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_prof');
    }
    //relation between professeur and module
    public function affectation_prof()
    {
        return $this->hasMany(affectation_prof::class, 'id_prof')->with('module');
    }
    
    //relation between profeseur and annonce
    public function annonce()
    {
        return $this->hasMany(annonce::class, 'id_prof');
    }

}
