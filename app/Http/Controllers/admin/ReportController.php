<?php

namespace App\Http\Controllers\admin;

use App\Arrival_date;
use App\Attendee_date;
use App\Attendee_extended_night;
use App\Attendees;
use App\Country;
use App\Departure_date;
use App\Register;
use App\Reportchecks;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\Constraint\Count;
use DB;

class ReportController extends Controller
{
    //
    public function index()
    {
        $reports = Reportchecks::find(1);
        $db_checkboxes = json_decode($reports->report, true);
        return view('admin.report.create')->with(compact('db_checkboxes'));
    }

    public function savedReports()
    {
        $reports = Reportchecks::all();
        //dd($reports);
        //$db_checkboxes = json_decode($reports->report, true);
        return view('admin.report.saved_listing')->with(compact('reports'));
    }

    public function saveDefultCheckboxes(Request $request)
    {
        if ($request->isMethod('post')) {
            $fields = array_keys($request->input());
            unset($fields[0]);// token
            if (!empty($fields)) {
                $report = Reportchecks::find(1);
                $report->report = json_encode($fields);
                if ($report->save())
                    $msg = "Ok::Checkboxes saved successfully";
                else
                    $msg = "Fail::Checkboxes not saved";
            } else
                $msg = "Fail::Checkboxes not saved";
            echo $msg;
        }
    }

    public function excel(Request $request)
    {
        if ($request->isMethod('POST')) {
            $registerData = array_keys($request->input());
            unset($registerData[0]);
            $file = $request->file_name;
            unset($registerData[1]);
            foreach ($registerData as $key => $col) {
                $registerData[$key] = str_replace(['::', '___'], [' as ', '.'], $col);
            }
            $data = implode(",", $registerData);
            // $data = Register::all()->toArray();
            $data = \DB::table('registers AS r')
                ->select(\DB::raw($data))
                ->join('attendees AS g', 'g.register_id', 'r.id')
                ->get();
            //dd($data);
            $data = $data->toArray();

            $attributes = array_keys(get_object_vars($data[0]));
            foreach ($attributes as $key => $value) {
                $attributes[$key] = str_replace('_', ' ', $value);
            }
            $sheetArray = [$attributes];

            // Add the results
            foreach ($data as $row) {

                $country = Country::find($row->Country); // get country by id
                $row->name = isset($country->name) ? $country->name : "";

                $Arrival_Date = Arrival_date::find($row->Arrival_Date); // get country by id
                $row->arrival_date = isset($Arrival_Date->arrival_date) ? $Arrival_Date->arrival_date : "";

                $Hotel_Dpt_Date = Departure_date::find($row->Hotel_Dpt_Date); //
                $row->Hotel_Dpt_Date = isset($Hotel_Dpt_Date->departure_date) ? $Hotel_Dpt_Date->departure_date : "";

                $Attendee_Extra_Nights = Attendee_extended_night::find($row->Attendee_Extra_Nights);
                $row->Attendee_Extra_Nights = isset($Attendee_Extra_Nights->extended_night) ? $Attendee_Extra_Nights->extended_night : "";

                $Attendee_Date = Attendee_date::find($row->Attendee_Date); //
                $row->Attendee_Date = isset($Attendee_Date->attendee_date) ? $Attendee_Date->attendee_date : "";

                $row->Send_Invoice = ($row->Send_Invoice == 1) ? 'Yes' : 'No';
                $row->Save_Info = ($row->Save_Info == 1) ? 'Yes' : 'No';

                
                array_push($sheetArray, get_object_vars($row));
            }

            Excel::create($file, function ($excel) use ($sheetArray, $attributes) {
                $excel->setTitle('Report');
                $excel->setCreator('Laravel');
                $excel->setDescription('Checkboxes Report');

                $excel->sheet('sheet1', function ($sheet) use ($sheetArray, $attributes) {
                    $sheet->cell('A1:AS1', function ($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('bold');
                    });
                    $sheet->fromArray($sheetArray, null, 'A1', false, false);
                });
            })->export('xls');
            exit();
        }
    }

    public function saveAndExport(Request $request)
    {
        if ($request->isMethod('post')) {
            $fields = array_keys($request->input());
            unset($fields[0]);// token
            $file = substr($request->file_name, 0, strpos($request->file_name, "."));
            //$file = $request->file_name;
            //$file_type = substr($file, strpos($file, ".") + 1);
            unset($fields[1]);// report file name
            $this->savaData($file, $fields);

            $fields = array_keys($request->input());
            $file = substr($request->file_name, 0, strpos($request->file_name, "."));
            //$file = $request->file_name;
            //$file_type = substr($file, strpos($file, ".") + 1);
            //dd($file);
            unset($fields[0]);// token
            unset($fields[1]);// report file name
            $this->exportReport($file, $fields);

        }

    }

    public function savaData($file, $fields)
    {
        $report = new Reportchecks();
        $report->name = $file;
        //$report->type = $file_type;
        $report->type = 'user_define';
        $report->report = json_encode($fields);
        $report->save();

    }

    public function exportReport($file, $fields)
    {
        foreach ($fields as $key => $col) {
            $registerData[$key] = str_replace(['::', '___'], [' as ', '.'], $col);
        }
        $data = implode(",", $registerData);
        // $data = Register::all()->toArray();
        $data = \DB::table('registers AS r')
            ->select(\DB::raw($data))
            ->join('attendees AS g', 'g.register_id', 'r.id')
            ->get();
        //dd($data);
        $data = $data->toArray();

        $attributes = array_keys(get_object_vars($data[0]));
        foreach ($attributes as $key => $value) {
            $attributes[$key] = str_replace('_', ' ', $value);
        }
        $sheetArray = [$attributes];

        // Add the results
        foreach ($data as $row) {
            $country = Country::find($row->Country); // get country by id
            $row->name = isset($country->name) ? $country->name : "";

            $Arrival_Date = Arrival_date::find($row->Arrival_Date); // get country by id
            $row->arrival_date = isset($Arrival_Date->arrival_date) ? $Arrival_Date->arrival_date : "";

            $Hotel_Dpt_Date = Departure_date::find($row->Hotel_Dpt_Date); //
            $row->Hotel_Dpt_Date = isset($Hotel_Dpt_Date->departure_date) ? $Hotel_Dpt_Date->departure_date : "";

            $Attendee_Extra_Nights = Attendee_extended_night::find($row->Attendee_Extra_Nights);
            $row->Attendee_Extra_Nights = isset($Attendee_Extra_Nights->extended_night) ? $Attendee_Extra_Nights->extended_night : "";

            $Attendee_Date = Attendee_date::find($row->Attendee_Date); //
            $row->Attendee_Date = isset($Attendee_Date->attendee_date) ? $Attendee_Date->attendee_date : "";

            $row->Send_Invoice = ($row->Send_Invoice == 1) ? 'Yes' : 'No';
            $row->Save_Info = ($row->Save_Info == 1) ? 'Yes' : 'No';
            array_push($sheetArray, get_object_vars($row));
        }

        Excel::create($file, function ($excel) use ($sheetArray, $attributes) {
            $excel->setTitle('Report');
            $excel->setCreator('Laravel');
            $excel->setDescription('Checkboxes Report');

            $excel->sheet('sheet1', function ($sheet) use ($sheetArray, $attributes) {
                $sheet->cell('A1:AS1', function ($cell) {
                    $cell->setFontSize(12);
                    $cell->setFontWeight('bold');
                });
                $sheet->fromArray($sheetArray, null, 'A1', false, false);
            });
        })->export('xls');
        exit();
    }

    public function downloadReport($id)
    {
        $reportData = Reportchecks::find($id);
        $file = $reportData->name;
        $file_type = 'xlsx';
        $fields = json_decode($reportData->report);
        foreach ($fields as $key => $col) {
            $registerData[$key] = str_replace(['::', '___'], [' as ', '.'], $col);
        }
        $data = implode(",", $registerData);
        $data = \DB::table('registers AS r')
            ->select(\DB::raw($data))
            ->join('attendees AS g', 'g.register_id', 'r.id')
            ->get();
        $data = $data->toArray();
        $attributes = array_keys(get_object_vars($data[0]));
        foreach ($attributes as $key => $value) {
            $attributes[$key] = str_replace('_', ' ', $value);
        }
        $sheetArray = [$attributes];

        // Add the results
        foreach ($data as $row) {
            $country = Country::find($row->Country); // get country by id
            $row->Country = isset($country->name) ? $country->name : "";

            $Arrival_Date = Arrival_date::find($row->Arrival_Date); // get country by id
            $row->Arrival_Date = isset($Arrival_Date->arrival_date) ? $Arrival_Date->arrival_date : "";

            $Hotel_Dpt_Date = Departure_date::find($row->Hotel_Dpt_Date); //
            $row->Hotel_Dpt_Date = isset($Hotel_Dpt_Date->departure_date) ? $Hotel_Dpt_Date->departure_date : "";

            $Attendee_Extra_Nights = Attendee_extended_night::find($row->Attendee_Extra_Nights);
            $row->Attendee_Extra_Nights = isset($Attendee_Extra_Nights->extended_night) ? $Attendee_Extra_Nights->extended_night : "";

            $Attendee_Date = Attendee_date::find($row->Attendee_Date); //
            $row->Attendee_Date = isset($Attendee_Date->attendee_date) ? $Attendee_Date->attendee_date : "";

            $row->Send_Invoice = ($row->Send_Invoice == 1) ? 'Yes' : 'No';
            $row->Save_Info = ($row->Save_Info == 1) ? 'Yes' : 'No';
            array_push($sheetArray, get_object_vars($row));
        }
        Excel::create($file, function ($excel) use ($sheetArray, $attributes) {
            $excel->setTitle('Report');
            $excel->setCreator('Laravel');
            $excel->setDescription('Checkboxes Report');

            $excel->sheet('sheet1', function ($sheet) use ($sheetArray, $attributes) {
                $sheet->cell('A1:BG1', function ($cell) {
                    $cell->setFontSize(12);
                    $cell->setFontWeight('bold');
                });
                $sheet->fromArray($sheetArray, null, 'A1', false, false);
            });
        })->export($file_type);
        exit();
    }
    public function singleReport(Request $request)
    {
        if ($request->isMethod('POST')) {
            $registerData = array_keys($request->input());
            unset($registerData[0]);
            unset($registerData[1]);
            $file = $request->file_name;
            $guestCols = ['col'=>[], 'col_as'=>[]];
            foreach ($registerData as $key => $col) {
                $col = str_replace(['::', '___'], [' as ', '.'], $col);
                if(strpos($col, 'g.') !== false){
                    $col_as = explode(' as ', $col);
                    array_push($guestCols['col'], $col); // push column name as db name
                    array_push($guestCols['col_as'], $col_as[1]); // push column name as shown in header
                    unset($registerData[$key]);
                    continue;
                }
                $registerData[$key] = $col;
            }
            $data = "r.id as ID , ".implode(",", $registerData);
            $guestCols['col'] = implode(", ", $guestCols['col']);

            $data = \DB::table('registers AS r')
                ->select(\DB::raw($data))
                ->get();

            $data = $data->toArray();
            $sheetArray = [];
            $count = 1;
            foreach ($data as $row) {
                if($count == 1){
                    $attributes = array_keys(get_object_vars($row));
                    foreach ($attributes as $key => $value) {
                        $attributes[$key] = str_replace('_', ' ', $value);
                    }
                    // add guest columns if exit
                    if(!empty($guestCols['col_as'])){
                        for($guest = 1; $guest <= 4; $guest++){
                            foreach($guestCols['col_as'] as $key => $g_cols){
                                array_push($attributes, $g_cols.'_'.$guest);
                            }
                        }
                    }
                    $sheetArray = [$attributes];
                }

                $country = Country::find($row->Country); // get country by id
                $row->Country = isset($country->name) ? $country->name : "";

                $Arrival_Date = Arrival_date::find($row->Arrival_Date); // get country by id
                $row->Arrival_Date = isset($Arrival_Date->arrival_date) ? $Arrival_Date->arrival_date : "";

                $Hotel_Dpt_Date = Departure_date::find($row->Hotel_Dpt_Date); //
                $row->Hotel_Dpt_Date = isset($Hotel_Dpt_Date->departure_date) ? $Hotel_Dpt_Date->departure_date : "";

                $Attendee_Extra_Nights = Attendee_extended_night::find($row->Attendee_Extra_Nights);
                $row->Attendee_Extra_Nights = isset($Attendee_Extra_Nights->extended_night) ? $Attendee_Extra_Nights->extended_night : "";

                $Attendee_Date = Attendee_date::find($row->Attendee_Date); //
                $row->Attendee_Date = isset($Attendee_Date->attendee_date) ? $Attendee_Date->attendee_date : "";

                $row->Send_Invoice = ($row->Send_Invoice == 1) ? 'Yes' : 'No';
                $row->Save_Info = ($row->Save_Info == 1) ? 'Yes' : 'No';

                $row = get_object_vars($row);

                if(!empty($guestCols['col'])){
                    $guests = \DB::table('attendees AS g')->select(\DB::raw($guestCols['col']))->where(['register_id'=>$row['ID']])->get();
                    foreach($guests as $key => $guest){
                        $guest = get_object_vars($guest);
                        $row = array_merge($row, $guest);
                    }
                }

                array_push($sheetArray, $row);
                $count++;

            }


            Excel::create($file, function ($excel) use ($sheetArray, $attributes) {
                $excel->setTitle('Report');
                $excel->setCreator('Laravel');
                $excel->setDescription('Checkboxes Report');

                $excel->sheet('sheet1', function ($sheet) use ($sheetArray, $attributes) {
                    $sheet->cell('A1:BG1', function ($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('bold');
                    });
                    $sheet->fromArray($sheetArray, null, 'A1', false, false);
                });
            })->export('xls');
            exit();
        }

    }
}