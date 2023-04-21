<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "cours";
    protected $primaryKey = 'id_cour';
    protected $fillable = ["libelleCour","contenu","id_module","id_section"];
    
    //relation with section
    public function section()
    {
        return $this->belognsTo(section::class, 'id_section');
    }
    //relation with module
    public function module()
    {
        return $this->belognsTo(module::class, 'id_module');
    }
}
