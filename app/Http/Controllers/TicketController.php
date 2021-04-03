<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $newTicket = new Ticket;
        $newTicketAdd = new TicketAdd;
        $fields = Field::where('active', 'Y')->get();

        $newTicket->phone = $request->phone;
        $newTicket->reason = $request->reason;

    }
}
