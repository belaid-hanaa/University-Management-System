<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = [
        'id_utilisateur',
        'nom',
        'prenom',
        'email',
        'password',
        'role',
    ];
    public $timestamps = false;
    
    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'ID_utilisateur');
    }

    public function departements()
    {
        return $this->belongsToMany(Departement::class, 'departementusers', 'id_utilisateur', 'ID_departement');
    }

    public function departementUsers()
    {
        return $this->hasMany(DepartementUser::class, 'id_utilisateur');
    }

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'filiereusers', 'id_utilisateur', 'id_filiere');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'moduleusers', 'id_utilisateur', 'id_module');
    }

    public function filiereUsers()
    {
        return $this->hasMany(FiliereUser::class, 'id_utilisateur');
    }
    
}
