<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "annonce";
    protected $primaryKey = 'id_annonce';
    protected $fillable = ["id_prof","id_module","titre","contenue",];
    
    protected $dates = [
        'datecreation'
    ];
    public function professeur()
    {
        return $this->belongsTo(professeur::class, 'id_prof');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }
}
