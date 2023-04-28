<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DaysOff extends Model
{
    use HasFactory;

    protected $fillable = [
        'old',
        'new',
        'user_id',
    ];
    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
