<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class ApiController extends Controller
{
    public function getDataTicketsByReason()
    {
        $data = [];
        $tickets = Ticket::select('reason_id', DB::raw("count(id) AS total"))
            ->whereDate('created_at', Carbon::today())
            ->groupBy('reason_id')
            ->get();

        foreach($tickets as $ticket)
        {
            $data['labels'][] = $ticket->reason->name;
            $data['data'][] = $ticket->total;
        }

        return($data);
    }
}
