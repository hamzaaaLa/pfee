<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'name',
        'prenom',
        'email',
        'cin',
        'telephone',
        'nomUtilisateur',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors for the user's image.
     *
     * @return string
     */
    public function getProfileImageUrlAttribute(): string
    {
        $filename = $this->attributes['imageProfile'];

        if ($filename) {
            return asset('imagesProfile/' . $filename);
        } else {
            return asset('img/professeur.jpg');
        }
    }

    /**
     * The mutator for the user's image.
     *
     * @param  string  $value
     * @return void
     */


    //relation between etud and user
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class, 'user_etud');
    }

    public function professeur()
    {
        return $this->hasOne(professeur::class, 'user_prof');
    }

    public function reply()
    {
        return $this->hasMany(reply::class,'id_user');
    }

    public function posts()
    {
        return $this->hasMany(posts::class,'id_user');
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "prof"][$value],
        );
    }
}
