<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

    public function averageWaitingTime()
    {
        $avg = DB::table('tickets_average')
            ->where('reason_id', $this->reason_id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        return $avg->average;
    }

    public function positionInLine()
    {
        $turn = DB::table('tickets')
            ->where([
                ['reason_id', $this->reason_id],
                ['status', 'W'],
            ])
            ->whereDate('created_at', Carbon::today())
            ->count();

        return $turn;
    }
}
