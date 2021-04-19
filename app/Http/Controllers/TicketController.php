<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\SaveTicketsRequest;
use App\Models\Ticket;
use App\Models\TicketAdd;
use App\Models\Reason;
use App\Models\Field;
use App\Models\Lab;

class TicketController extends Controller
{
    public function showTicketForm($lab)
    {
        $reasons = Reason::where('active', 'Y')->get();
        $fields = Field::where('active', 'Y')->get();
        $lab = Lab::find($lab);
        $terms = "Acepto terminos y condiciones";

        return view('mobile.ticket', [
            'reasons' => $reasons,
            'fields' => $fields,
            'lab' => $lab,
            'terms' => $terms,
        ]);
    }

    public function saveTicket(SaveTicketsRequest $request)
    {
        $exist = Ticket::where([
            ['status', 'W'],
            ['phone', $request->phone],
        //  ['reason_id', $request->reason],
        ])->whereDate('created_at', Carbon::today())->get();

        if($exist)
        {
            return view('mobile.warning', [
                'ticket' => $exist,
            ]);
        }

        $newTicket = new Ticket;
        $fields = Field::where('active', 'Y')->get();
        $serie = Reason::find($request->reason)->serie;
        $next = Ticket::where('reason_id', $request->reason)->whereDate('created_at', Carbon::today())->count() + 1;
        $newTicket->ticket = $serie . str_pad($next, 4, "0", STR_PAD_LEFT);
        $newTicket->phone = $request->phone;
        $newTicket->reason_id = $request->reason;
        $newTicket->save();

        foreach($fields as $field)
        {
            if ($request->has(strtolower($field->name)))
            {
                $newTicketAdd = new TicketAdd;
                $newTicketAdd->ticket_id = $newTicket->id;
                $newTicketAdd->field_id = $field->id;
                $newTicketAdd->info = $request[strtolower($field->name)];
                $newTicketAdd->save();
            }
        }

        return view('mobile.success', [
            'ticket' => $newTicket,
        ]);
    }
}
