<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "posts";
    protected $primaryKey = "id_post";
    protected $fillable = ["id_user","titre","contenu","id_module"];
    protected $dates = [
        'date_created'
    ];
    //relation with module
    public function module()
    {
        return $this->belongsTo(module::class,'id_module');
    }
    //relation with reply
    public function reply()
    {
        return $this->hasMany(reply::class,'id_post');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'id_user');
    }

}
