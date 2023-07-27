<?php

namespace App\Models;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;
    protected $casts=[
        'last_credited'=>'datetime:Y-m-d',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
