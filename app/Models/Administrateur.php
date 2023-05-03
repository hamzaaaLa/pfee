<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $table = "administrateur";
    protected $primaryKey = "id_admin";
    protected $fillable = ["user_admin", "dateEmbauche"];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_admin');
    }

}
