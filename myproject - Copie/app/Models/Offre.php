<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable=[
        'titre','ville','pays','description','societe','contenu','slug', 'type_contrat','salair','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function candidate(){
        return $this->hasMany(Candidate::class);
    }
}
