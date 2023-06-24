<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    use HasFactory;

    protected $table = 'physician_portfolio';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
