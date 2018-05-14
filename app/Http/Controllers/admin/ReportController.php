<?php

namespace App\Http\Controllers\admin;

use App\Country;
use App\Register;
use App\ReportChecks;
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
        $reports = ReportChecks::find(1);
        $db_checkboxes = json_decode($reports->report, true);
        return view('admin.report.create')->with(compact('db_checkboxes'));
    }

    public function saveDefultCheckboxes(Request $request)
    {
        if ($request->isMethod('post')) {
            $fields = array_keys($request->input());
            unset($fields[0]);// token
            if (!empty($fields)) {
                $report = ReportChecks::find(1);
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
            foreach($registerData as $key => $col){
               $registerData[$key] = str_replace(['::','___'], [' as ','.'], $col);
            }
            $data = implode(",",$registerData);
            // $data = Register::all()->toArray();
            $data =  \DB::table('registers AS r')
                ->select(\DB::raw($data))
                ->join('attendees AS g','g.register_id','r.id')
                ->get();
            $data = $data->toArray();

            $attributes = array_keys(get_object_vars($data[0]));
            foreach ($attributes as $key => $value) {
                $attributes[$key] = str_replace('_', ' ', $value);
            }
            $sheetArray = [$attributes];
            // Add the results
            foreach($data  as $row){
                $country = Country::find($row->Country); // get country by id
                $row->Country = isset($country->name) ? $country->name:"" ;

                $Arrival_Date = \App\Arrival_Date::find($row->Arrival_Date); // get country by id
                $row->Arrival_Date = isset($Arrival_Date->arrival_date) ? $Arrival_Date->arrival_date:"" ;

                $Hotel_Dpt_Date = \App\Departure_date::find($row->Hotel_Dpt_Date); //
                $row->Hotel_Dpt_Date = isset($Hotel_Dpt_Date->departure_date) ? $Hotel_Dpt_Date->departure_date:"" ;

                $Attendee_Extra_Nights = \App\Attendee_extended_night::find($row->Attendee_Extra_Nights); 
                $row->Attendee_Extra_Nights = isset($Attendee_Extra_Nights->extended_night) ? $Attendee_Extra_Nights->extended_night:"" ;

                $Attendee_Date = \App\Attendee_date::find($row->Attendee_Date); //
                $row->Attendee_Date = isset($Attendee_Date->attendee_date) ? $Attendee_Date->attendee_date:"" ;

                $row->Send_Invoice = ($row->Send_Invoice == 1) ? 'Yes':'No';
                $row->Save_Info = ($row->Save_Info == 1) ? 'Yes':'No';
                array_push($sheetArray,get_object_vars($row));
            }

            Excel::create('report', function ($excel) use ($sheetArray, $attributes) {
                $excel->setTitle('Report');
                $excel->setCreator('Laravel');
                $excel->setDescription('Checkboxes Report');

                $excel->sheet('sheet1', function ($sheet) use ($sheetArray, $attributes) {
                    $sheet->cell('A1:AS1', function($cell) {
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


            //dd($register_report);
           // $reports = $register_report->toArray();
            //$data= json_decode( json_encode($reports), true);
            /*$report_data = array();
            foreach ($reports as $report) {
                $report_data[] = (array)$report;
            }*/
            //dd($reports);
          //  dd($attributes);


           /* $data =  \DB::table('registers')
                ->select(\DB::raw($data))
                ->get();
            $data = json_decode(json_encode($data), true);
           // dd($data);
            $attributes = array_keys($data[0]);*/
//           dd($attributes);