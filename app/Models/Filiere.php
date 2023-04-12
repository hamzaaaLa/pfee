<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $table='filiere';
   // @var array<int, string>
     public $timestamps = false;
     //protected $primaryKey='email';
    // public $incrementing=false;
     protected $primaryKey ='id_filiere';

     //protected $keyType='string'; 
    protected $fillable = [
        'libellefiiere',
        
    ];
}
