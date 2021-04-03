<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveReasonsRequest;
use App\Models\Reason;

class ReasonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showReasons()
    {
        $reasons = Reason::all();

        return view('pages.reasons', ['reasons' => $reasons]);
    }

    public function saveReason(SaveReasonsRequest $request)
    {
        $newReason = new Reason;
        $newReason->name = $request->name;
        $newReason->save();

        return redirect()->route('reasons');
    }
}
