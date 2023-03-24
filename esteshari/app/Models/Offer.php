<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";
    protected $fillable = ['name','price','details','created_at','updated_at']; // White-box: Ay 7aga tet7at hena heyya elly betetkhazen fel database bas: lamma n3ouz ne3mel insert aw update fel database
    protected $hidden = ['created_at','updated_at']; //Zay timestamps; benekhfeeha 3ashan mayetbe3toush fel APIs, etc.
 }
