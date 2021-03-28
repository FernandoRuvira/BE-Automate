<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showClients()
    {
        $clients = Client::where('status', 'A')->get();

        return view('pages.clients', ['clients' => $clients]);
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
