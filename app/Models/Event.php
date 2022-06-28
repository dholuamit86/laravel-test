<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;
use Illuminate\Support\Carbon;

class Event extends Model
{

    public function workshops(){
        return $this->hasMany(Workshop::class);
    }

    public function futureEvents()
    {
        $today = Carbon::today();
        return $this->hasMany(Workshop::class)->where('start', '>', $today);
    }
}
