<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Ticket;

class TwilioController extends Controller
{
    public function sandboxMessage()
    {
        $sid    = "AC1a8042340719384064a12560bcbe72fc";
        $token  = "344d4feaf4985ef86dbbc0b4b4f08bde";
        $twilio = new Client($sid, $token);

        $phone = '+5213312801319';
        $local = 'Sucursal';
        $ticket = 'NoTicket';

        $message = $twilio->messages->create(
            "whatsapp:{$phone}", // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "Your appointment is coming up on {$local} at {$ticket}"
            )
        );

        print($message->sid);
    }
}
