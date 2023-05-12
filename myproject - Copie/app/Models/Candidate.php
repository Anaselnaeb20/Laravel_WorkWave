<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom','prenom','email','phone','date_naissance','resume','cover_letter', 'image','user_id','offre_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function offre()
{
    return $this->belongsTo(Offre::class);
}
}
