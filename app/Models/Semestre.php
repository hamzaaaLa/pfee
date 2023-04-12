<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $table='semestre';
   // @var array<int, string>
     public $timestamps = false;
     //protected $primaryKey='email';
    // public $incrementing=false;
     protected $primaryKey ='id_semestre';

     //protected $keyType='string'; 
}
