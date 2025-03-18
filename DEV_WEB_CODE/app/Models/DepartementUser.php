<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementUser extends Model
{
    use HasFactory;

    protected $table = 'departementusers';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'id_departement', 'id_utilisateur',
    ];

    public $timestamps = false;
}

