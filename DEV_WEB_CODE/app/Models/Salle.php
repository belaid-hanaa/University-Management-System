<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salle';
    protected $primaryKey = 'ID_salle';

    protected $fillable = [
        'Nom_salle',
        'Type',
        'ID_departement',
    ];

    public $timestamps = false;

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'ID_departement');
    }

    public function emplois()
    {
        return $this->hasMany(Emploi::class, 'ID_Salle');
    }
}

