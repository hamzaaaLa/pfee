<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class affectation_section extends Model
{
    use HasFactory;
    protected $table = "affectation_section";
    protected $primaryKey = 'id_affect';
    protected $fillable = ["id_module", "id_section"];
    public $timestamps = false;
    
    //relation with module || section
    public function module()
    {
        return $this->belongsTo(module::class, 'id_module');
    }

    public function section()
    {
        return $this->belongsTo(section::class, 'id_section');
    }
}
