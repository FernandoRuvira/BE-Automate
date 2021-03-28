<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $attributes = [
        'status' => 'A',
    ];

    public function processes()
    {
        return $this->hasMany(Process::class);
    }
}
