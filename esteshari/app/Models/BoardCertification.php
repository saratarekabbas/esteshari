<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCertification extends Model
{
    use HasFactory;

    protected $table = 'board_certifications';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
