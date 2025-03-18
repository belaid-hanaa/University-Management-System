<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'module';

    protected $primaryKey = 'id_module';

    protected $fillable = [
        'nom', 'description', 'id_filiere',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }

    public function users()
    {
        return $this->belongsToMany(Utilisateur::class, 'moduleusers', 'id_module', 'id_utilisateur');
    }

    public function emplois()
    {
        return $this->hasMany(Emploi::class, 'id_module');
    }
}
