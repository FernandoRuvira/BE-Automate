<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{
    public function sandboxMessage()
    {
        $sid    = "AC1a8042340719384064a12560bcbe72fc";
        $token  = "344d4feaf4985ef86dbbc0b4b4f08bde";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages ->create("whatsapp:+5213310820693", // to
                           array(
                               "from" => "whatsapp:+14155238886",
                               "body" => "Su ticket es el 674, le avisaremos cuando sea su turno"
                           )
                  );

        print($message->sid);
    }
}
