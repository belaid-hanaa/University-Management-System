<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $table = 'departement';

    protected $primaryKey = 'ID_departement';

    protected $fillable = [
        'Nom_departement',
    ];

    public function users()
    {
        return $this->belongsToMany(Utilisateur::class, 'departementusers', 'id_departement', 'id_utilisateur');
    }

    public function filieres()
    {
        return $this->hasMany(Filiere::class, 'id_departement');
    }
}
