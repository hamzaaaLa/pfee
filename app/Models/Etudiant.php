<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
   // @var array<int, string>
     public $timestamps = false;
     //protected $primaryKey='email';
     public $incrementing=false;
     protected $primaryKey ='id_etud';

     //protected $keyType='string'; 
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'cne',
    ];

}
