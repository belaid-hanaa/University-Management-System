<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class support extends Model
{
    use HasFactory;
    protected $fillable =[
        'ID_support',
        'nom',
        'CNE',
        'demande',
    ];
    public $timestamps = false;
}
