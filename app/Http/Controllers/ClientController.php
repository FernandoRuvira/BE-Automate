<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Ticket;
use DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showClients()
    {
        $clients = Ticket::select('id','phone')->groupBy('phone')->get();

        return view('pages.clients', [
            'clients' => $clients
        ]);
    }

    public function infoClient(Request $r){
        $response = DB::table('tickets_add')->join('fields','fields.id', 'tickets_add.field_id')
        ->select(
            'fields.name',
            'tickets_add.info'
        )
        ->where([
            ['tickets_add.ticket_id',$r->ticket],
            ['fields.active','Y']
        ])
        ->get();

        return json_encode($response);
    }

    public function showClientRecord($id)
    {
        return $id;
    }

    public function getClientProcesses(Request $request)
    {
        $id = $request->client;
        return Client::find($id)->processes;
    }
}
