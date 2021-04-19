<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Ticket;
use App\Models\Reason;

class QueueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showQueue()
    {
        $queues = array();
        $reasons = Reason::where('active', 'Y')->get();

        foreach($reasons as $reason)
        {
            $tickets = Ticket::where([
                ['reason_id', $reason->id],
                ['status', '!=', 'F'],
            ])->whereDate('created_at', Carbon::today())->orderBy('id')->get();

            $queues[$reason->id] = array('reason' => $reason, 'tickets' => $tickets);
        }

        return view('pages.queue', [
            'queues' => $queues,
        ]);
    }

    public function callNext($queue)
    {
        $servingTicket = Ticket::where([
            ['reason_id', $queue],
            ['status', 'S'],
        ])->whereDate('created_at', Carbon::today())->orderBy('id')->first();

        $nextTicket = Ticket::where([
            ['reason_id', $queue],
            ['status', 'W'],
        ])->whereDate('created_at', Carbon::today())->orderBy('id')->first();

        if(!empty($servingTicket->id))
        {
            $servingTicket->status = 'F';
            $servingTicket->save();
        }

        if(!empty($nextTicket->id))
        {
            $nextTicket->status = 'S';
            $nextTicket->save();
        }

        return redirect()->route('queue');
    }
}
