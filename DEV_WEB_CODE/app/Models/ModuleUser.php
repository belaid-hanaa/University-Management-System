<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleUser extends Model
{
    use HasFactory;

    protected $table = 'moduleusers';

    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'id_module', 'id_utilisateur',
    ];

    public $timestamps = false;
}
