<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Twilio\Rest\Client;
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
            ])->whereDate('created_at', Carbon::today())->orderBy('id')->limit(4)->get();

            $count = Ticket::where([
                ['reason_id', $reason->id],
                ['status', 'W'],
            ])->whereDate('created_at', Carbon::today())->count();

            $queues[$reason->id] = array('reason' => $reason, 'tickets' => $tickets, 'count' => $count);
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

            $this->sendThanksMessage($servingTicket);
        }

        if(!empty($nextTicket->id))
        {
            $nextTicket->status = 'S';
            $nextTicket->updated_at = Carbon::now();
            $nextTicket->save();

            $this->sendCallMessage($nextTicket);
        }

        return redirect()->route('queue');
    }

    private function sendCallMessage($ticket)
    {
        $sid = config('twilio.sid');
        $token = config('twilio.token');
        $number = config('twilio.number');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            "whatsapp:+521{$ticket->phone}",
            array(
                "from" => "whatsapp:".$number,
                "body" => "Ticket {$ticket->ticket}. Es su turno, favor de pasar a la ventanilla."
            )
        );
    }

    private function sendThanksMessage($ticket)
    {
        $sid = config('twilio.sid');
        $token = config('twilio.token');
        $number = config('twilio.number');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            "whatsapp:+521{$ticket->phone}",
            array(
                "from" => "whatsapp:".$number,
                "body" => "Ticket {$ticket->ticket}. Gracias por su visita."
            )
        );
    }
}
