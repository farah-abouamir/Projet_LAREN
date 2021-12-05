<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Http\Controllers\UserController;



class Commission extends Model
{
    use HasFactory;
    
    public $fillable = ['matière','niveau_c','type'];
   
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_id');
    }  
    
    public function demandes()
    {
        return $this->belongsToMany(Demande::class)->withPivot('demande_id');
    }  
    
}
