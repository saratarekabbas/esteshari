<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicianReference extends Model
{
    use HasFactory;

    protected $table = 'physician_references';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
