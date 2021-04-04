<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAdd extends Model
{
    use HasFactory;

    protected $table = 'tickets_add';
    protected $fillable = [
        'ticket_id',
        'field_id',
        'info'
    ];

    public $timestamps = false;
}
