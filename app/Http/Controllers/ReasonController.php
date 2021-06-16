<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveReasonsRequest;
use App\Models\Reason;
use DB;
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
        $newReason->serie = $request->serie;
        $newReason->save();
        return redirect()->route('reasons');
    }
    public function deleteReason(Request $request)
    {
       $id=$request['id'];
       $query=DB::table('reasons')->where('id',$id)->delete();
      return redirect()->route('reasons');  
   }
}
