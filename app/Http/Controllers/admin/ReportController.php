<?php

namespace App\Http\Controllers\admin;

use App\Register;
use App\ReportChecks;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function index(){
    	$reports = ReportChecks::find(1);
        $db_checkboxes = json_decode($reports->report, true);
        return view('admin.report.create')->with(compact('db_checkboxes'));
    }

    public function saveDefultCheckboxes(Request $request){
        if ($request->isMethod('post')) {
        	$fields = array_keys($request->input());
        	unset($fields[0]);// token
        	if(!empty($fields)){
        		$report = ReportChecks::find(1);
        		$report->report = json_encode($fields);
        		if($report->save())
        			$msg = "Ok::Checkboxes saved successfully";
        		else 
        			$msg = "Fail::Checkboxes not saved";
        	}
    		else 
    			$msg = "Fail::Checkboxes not saved";
    		echo $msg;
    	}
    }
    public function excel(Request $request)
    {
        if ($request->isMethod('POST')){
            dd('Hello');
        }

        $register_report = Register::all();
        $register = $register_report->first();
        $attribute[] = array_keys($register->toArray());

         Excel::create('report', function($excel) use ($register_report,$attribute) {

            $excel->setTitle('Report');
            $excel->setCreator('Laravel');
            $excel->setDescription('Checkboxes Report');

            $excel->sheet('sheet1', function($sheet) use ($register_report,$attribute) {
                $sheet->fromArray($attribute, null, 'A1', false, false);
                $sheet->fromArray($register_report, null, 'A2', false, false);
            });
        })->export('xls');
    }

}
