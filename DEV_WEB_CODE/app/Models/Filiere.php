<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $table = 'filiere';

    protected $primaryKey = 'id_filiere';
    public $timestamps = false;

    protected $fillable = [
        'nom', 'description', 'id_departement',
    ];

    public function users()
    {
        return $this->belongsToMany(Utilisateur::class, 'filiereusers', 'id_filiere', 'id_utilisateur');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'ID_departement');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'id_filiere');
    }
}
