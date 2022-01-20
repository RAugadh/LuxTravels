<?php

namespace App\Models;
use App\Models\User;
use App\Models\TourPackage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function tours()
    {
        return $this->hasMany('App\Models\TourPackage');
    }
}