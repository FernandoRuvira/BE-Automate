<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Http\Requests\SaveLabsRequest;
use App\Models\Schedule;
use App\Models\Ticket;
use DB;
use Illuminate\Support\Carbon;

class LabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showLabs()
    {
        $labs = Lab::where('status', 'A')->get();
        $today = Carbon::now();
        $today = $today->format('Y-m-d');
        $todayM = Carbon::now()->addMonths(-1);
        $todayM = $todayM->format('Y-m-d');

        return view('pages.labs', [
            'labs' => $labs,
            'dateI' => $todayM,
            'dateF' => $today
        ]);
    }

    public function showTicketsByLab(Request $r){
        
        $tickets = Ticket::join('labs', 'labs.id','tickets.lab_id')
            ->whereBetween('tickets.created_at',[$r->dateI, $r->dateF])
            ->where('labs.id',$r->lab)
            ->select(
                DB::raw('labs.name as Name'),
                DB::raw('count(tickets.lab_id) as Total'))
       ->groupBy('tickets.lab_id')->get();

       $array1[] = ['Name', 'Total'];

        foreach($tickets as $key => $value)
        {
            $array1[++$key] = [$value->Name, $value->Total];
        }

        return $array1;
    }

    public function saveLab(SaveLabsRequest $request)
    {
        $newLab = new Lab;
        $newLab->name = $request->name;
        $newLab->city = $request->city;
        $newLab->address = $request->address;
        $newLab->save();

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
        {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            if (in_array($fileExtension, array('jpg', 'gif', 'png')))
            {
                $newFileName = 'lab_' . $newLab->id . '.' . $fileExtension;
                $dest_path = public_path().'/img/labs/'.$newFileName;
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $newLab->image = $newFileName;
                    $newLab->save();
                }
            }
        }

        $this->saveSchedule($newLab->id, $request);
        return redirect()->route('labs');
    }

    private function saveSchedule($lab_id, $request)
    {
        foreach($request->days as $day)
        {
            $schedule = new Schedule;
            $schedule->lab_id = $lab_id;

            switch($day)
            {
                case 'Monday':
                    $schedule->day = 'Lun';
                    $schedule->opening = $this->getOpening($request->monday);
                    $schedule->closing = $this->getClosing($request->monday);
                    break;
                case 'Tuesday':
                    $schedule->day = 'Mar';
                    $schedule->opening = $this->getOpening($request->tuesday);
                    $schedule->closing = $this->getClosing($request->tuesday);
                    break;
                case 'Wednesday':
                    $schedule->day = 'Mie';
                    $schedule->opening = $this->getOpening($request->wednesday);
                    $schedule->closing = $this->getClosing($request->wednesday);
                    break;
                case 'Thursday':
                    $schedule->day = 'Jue';
                    $schedule->opening = $this->getOpening($request->thursday);
                    $schedule->closing = $this->getClosing($request->thursday);
                    break;
                case 'Friday':
                    $schedule->day = 'Vie';
                    $schedule->opening = $this->getOpening($request->friday);
                    $schedule->closing = $this->getClosing($request->friday);
                    break;
                case 'Saturday':
                    $schedule->day = 'Sab';
                    $schedule->opening = $this->getOpening($request->saturday);
                    $schedule->closing = $this->getClosing($request->saturday);
                    break;
                case 'Sunday':
                    $schedule->day = 'Dom';
                    $schedule->opening = $this->getOpening($request->sunday);
                    $schedule->closing = $this->getClosing($request->sunday);
                    break;
            }

            $schedule->save();
        }
    }

    private function getOpening($range)
    {
        $times = explode(" - ", $range);

        return date("H:i", strtotime($times[0]));
    }

    private function getClosing($range)
    {
        $times = explode(" - ", $range);

        return date("H:i", strtotime($times[1]));
    }

    public function editLab(Request $request)
    {
            $id=$request['id'];
            $lab=DB::table("labs")->select('*')->where('id',$id)->get();
            $horario=DB::table("schedules")->select('lab_id', 'day', 'opening', 'closing')->where('lab_id',$id)->get();
            $a=json_encode($lab);
            $b=json_encode($horario);            
            return json_encode(array_merge(json_decode($a, true),json_decode($b, true)));
    }
  public function deleteLab(Request $request)
    {
        $id=$request->id; 
        DB::table("labs")->where("id",$id)->update(['status'=>'D']);
        //return redirect()->route('labs');
    }
  public function updateLab(Request $request)
    {
        $id=$request->IDE; 
         DB::table("schedules")->where("lab_id",$id)->delete();
         DB::table("labs")->where("id",$id)->delete();
        $newLab = new Lab;
        $newLab->name = $request->nameInputE;
        $newLab->city = $request->cityInputE;
        $newLab->address = $request->addressInputE;
        $newLab->save();
        if (isset($_FILES['imageInputE']) && $_FILES['imageInputE']['error'] === UPLOAD_ERR_OK)
        {
            $fileTmpPath = $_FILES['imageInputE']['tmp_name'];
            $fileName = $_FILES['imageInputE']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            if (in_array($fileExtension, array('jpg', 'gif', 'png')))
            {
                $newFileName = 'lab_' . $newLab->id . '.' . $fileExtension;
                $dest_path = public_path().'/img/labs/'.$newFileName;
                if(move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $newLab->image = $newFileName;
                    $newLab->save();
                }
            }
        }
        $this->saveSchedule($newLab->id, $request);
        return redirect()->route('labs');
    }
}
