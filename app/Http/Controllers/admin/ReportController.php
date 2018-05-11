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
            dd($request->input());
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
            $data = implode(",",$registerData);

            //dd($register_report);
           // $reports = $register_report->toArray();
            //$data= json_decode( json_encode($reports), true);
            /*$report_data = array();
            foreach ($reports as $report) {
                $report_data[] = (array)$report;
            }*/
            //dd($reports);
           $data = Register::all()->first()->toArray();
          //  dd($data);
            $attribute = Register::all();
            $register = $attribute->first();
            $attributes = array_keys($register->toArray());
          //  dd($attributes);


           /* $data =  \DB::table('registers')
                ->select(\DB::raw($data))
                ->get();
            $data = json_decode(json_encode($data), true);
           // dd($data);
            $attributes = array_keys($data[0]);*/
//           dd($attributes);
            Excel::create('report', function ($excel) use ($attributes, $data) {

                $excel->setTitle('Report');
                $excel->setCreator('Laravel');
                $excel->setDescription('Checkboxes Report');

                $excel->sheet('sheet1', function ($sheet) use ($attributes, $data) {
                    $sheet->fromArray($attributes, null, 'A1', false, false);
                  $sheet->fromArray($data, null, 'A2', false, false);
                });
                //ob_end_clean();
            })->export('xls');
        }

    }

}
