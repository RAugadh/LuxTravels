<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TourModules;
use App\Models\Tickets;

class TourPackage extends Model
{
    use HasFactory;
    public function tickets()
    {
        return $this->hasMany('App\Models\Tickets');
    }
    public function modules()
    {
        return $this->hasMany('App\Models\TourModules');
    }
}