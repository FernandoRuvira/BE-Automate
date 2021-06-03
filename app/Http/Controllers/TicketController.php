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
use App\Models\Schedule;

class TicketController extends Controller
{
    public function showTicketForm($lab)
    {
        $validation = $this->schedulesValidation($lab);

        if($validation == 1){
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
        }else{
            $day = $this->formatDay();
            $labs = Lab::join('schedules','schedules.lab_id','labs.id')
                ->where([
                    ['day',$day],
                    ['labs.id',$lab]
            ])->first();

            return view('mobile.scheduleError', [
                'lab' => $labs
            ]);
        }

        
    }

    public function saveTicket(SaveTicketsRequest $request)
    {
        $exist = Ticket::where([
            ['status', 'W'],
            ['phone', $request->phone],
        //  ['reason_id', $request->reason],
        ])->whereDate('created_at', Carbon::today())->first();

        if(!empty($exist->id))
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

    public function schedulesValidation($lab){
        
        $hour = Carbon::now()->format('H:i');
        $schedules = Schedule::where('lab_id',$lab)->get();
        $day = $this->formatDay();

        foreach($schedules as $s){
            if($s->day == $day){
                if($hour >= $s->opening && $hour <= $s->closing){
                    return 1;
                }else{
                    return 0;
                }
            }
        }
    }

    public function formatDay(){
        $day = Carbon::today()->format('l');

        switch ($day) {
            case "Monday":
                $day = "Lun";
                break;
            case "Tuesday":
                $day = "Mar";
                break;
            case "Wednesday":
                $day = "Mie";
                break;
            case "Thursday":
                $day = "Jue";
                break;
            case "Friday":
                $day = "Vie";
                break;
            case "Saturday":
                $day = "Sab";
                break;
            case "Sunday":
                $day = "Dom";
                break;
        }

        return $day;
    }
}
