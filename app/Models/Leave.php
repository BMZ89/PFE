<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vacation;

class Leave extends Model
{
    use HasFactory;
    public $fillable = [
        'start_date',
        'end_date',
        'requested_days',
   ];

    public function userRequest()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function leaveRequest() : HasOne
    {
        return $this->hasOne(Vacation::class, 'balance');
    }
}
