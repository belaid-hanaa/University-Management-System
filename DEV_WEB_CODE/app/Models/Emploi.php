<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $table = 'emploi';
    protected $primaryKey = 'id_emploi';

    protected $fillable = [
        'ID_prof',
        'id_module', 
        'ID_Salle', 
        'ID_departement', 
        'Crenaux', 
        'Jours',
        'raison',
    ];

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'ID_Salle');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'ID_departement');
    }
}
