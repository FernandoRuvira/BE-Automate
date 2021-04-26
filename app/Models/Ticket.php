<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'reason'];
    protected $attributes = [
        'status' => 'W',
    ];

    public function reason()
    {
        return $this->hasOne(Reason::class, 'id', 'reason_id');
    }
}
