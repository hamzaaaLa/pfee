<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation_etud extends Model
{
    use HasFactory;
    protected $table = "affectation_etud";
    protected $primaryKey = 'id_affect';
         // Add this line to indicate composite primary key
    protected $keyType = 'int'; // Add this line to specify primary key type
    protected $fillable = [ "id_etud","id_module"];
}
