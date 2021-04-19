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
        $reasons = Reason::where('active', 'Y')->get();
        $waiting = Ticket::where('status', 'W')->whereDate('created_at', Carbon::today())->get();
        $serving = Ticket::where('status', 'S')->whereDate('created_at', Carbon::today())->get();

        return view('pages.queue', [
            'waiting' => $waiting,
            'serving' => $serving,
        ]);
    }
}
