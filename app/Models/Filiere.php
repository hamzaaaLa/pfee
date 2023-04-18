<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    use HasFactory;
    protected $table='filiere';
     public $timestamps = false;
     protected $primaryKey ='id_filiere';
    protected $fillable = [
        'libellefiliere',  
    ];
    
    public function module()
    {
        return $this->hasMany(module::class, 'id_filiere');
    }

}
