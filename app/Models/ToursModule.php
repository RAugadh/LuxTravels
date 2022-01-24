<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToursModule extends Model
{
    use HasFactory;

    protected $fillable = [

        'module_1',
        'module_2',
        'module_3',
        'module_4',
        'module_5',
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}