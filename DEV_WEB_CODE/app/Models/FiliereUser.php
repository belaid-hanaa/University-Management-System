<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliereUser extends Model
{
    use HasFactory;

    protected $table = 'filiereusers';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'id_filiere', 'id_utilisateur',
    ];

    public $timestamps = false;
}

