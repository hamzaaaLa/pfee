<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "reply";
    protected $primaryKey = 'id_reply';
    protected $fillable = ["id_post","id_user","contenu",];
    protected $dates = [
        'date_created'
    ];
    //relation with post
    public function posts()
    {
        return $this->belongsTo(posts::class,'id_post');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'id_user');
    }
}
