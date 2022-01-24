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
    ];
    public function modules()
    {
        return $this->hasOne(ToursModule::class);
    }
}