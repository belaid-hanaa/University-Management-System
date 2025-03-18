<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $table = 'annonce'; // Adjust the table name if needed

    protected $fillable = [
        'ID_module',
        'ID_utilisateur',
        'ID_annonce',
        'Type_annonce',
        'Contenu',
        'ID_filiere',
        'ID_departement',
        'titre',
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'ID_utilisateur');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'ID_module');
    }
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'ID_filiere');
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'ID_departement');
    }
    public function home()
    {
        $homePageAnnouncements = Annonce::where('Type_annonce', 'HomePage')->limit(5)->get();
        return view('home', ['homePageAnnouncements' => $homePageAnnouncements]);
    }
}
