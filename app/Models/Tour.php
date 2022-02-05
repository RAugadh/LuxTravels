<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $casts = [
        'highlight' => 'boolean',
    ];
    protected $fillable = [
        'name',
        'sub',
        'description',
        'price',
        'boarding_1',
        'boarding_2',
        'boarding_3',
    ];
    public function modules()
    {
        return $this->hasOne(ToursModule::class);
    }
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}