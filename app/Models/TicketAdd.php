<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAdd extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'field_id', 'info'];
    protected $attributes = [
        'status' => 'N',
    ];
}
