<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shows extends Model
{
    use HasFactory;

    public function shows(){
        return $this->belongsToMany(Screen::class);
    }
}
