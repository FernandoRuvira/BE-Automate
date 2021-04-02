<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Http\Requests\SaveLabsRequest;
use App\Models\Schedule;

class LabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showLabs()
    {
        $labs = Lab::where('status', 'A')->get();

        return view('pages.labs', ['labs' => $labs]);
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
}
