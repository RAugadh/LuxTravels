<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourModules extends Model
{
    use HasFactory;

    public function tours()
    {
        return $this->belongsTo('App\Models\TourPackage');
    }
}