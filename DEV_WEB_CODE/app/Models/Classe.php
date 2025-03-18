<?php
// app\Models\Classe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classe';
    protected $primaryKey = 'ID_classe';
    public $timestamps = false;

    protected $fillable = [
        'Nom_classe',
        'id_departement',
        'id_filiere',
        'id_etudiant1',
        'id_etudiant2',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
    public function etudiant1()
    {
        return $this->belongsTo(Utilisateur::class, 'id_etudiant1');
    }

    public function etudiant2()
    {
        return $this->belongsTo(Utilisateur::class, 'id_etudiant2');
    }
}