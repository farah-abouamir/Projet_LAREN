<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    public $fillable = ['nom','user_id','adresse', 'email', 'nomProd',  'matiere', 'niveau','type','filePath','guide','lien','rapport'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    } 

    public function commissions()
    {
        return $this->belongsToMany(Commission::class,'commission_id');
    } 
}