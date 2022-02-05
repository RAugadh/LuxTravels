<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'passengers',
        'boarding_at',
        'total_price',
        'boarding_date',
        'diet',
        'approved',
        'approved_by',
        'cancelled',
        'cancelled_by',
    ];
    public function tour()
    {
        return $this->belongsToMany(Tour::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}