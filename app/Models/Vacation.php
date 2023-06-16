<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Leave;
class Vacation extends Model
{
    use HasFactory;
    public $fillable = [
         'user_id',
         
         'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function balance()
    {
        return $this->hasMany(Leave::class);
    }
    
}
