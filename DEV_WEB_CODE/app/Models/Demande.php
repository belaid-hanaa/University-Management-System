<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demandes';
    protected $primaryKey = 'id_demande';

    protected $fillable = [
        'id_utilisateur',
        'id_module',
        'id_filiere',
        'contenu',
        'status',
        'type',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
}
