<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        'image',
    ];

    protected $attributes = [
        'status' => 'A',
        'image' => '',
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }


    public function tickets()
    {

    }
}
