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
}
