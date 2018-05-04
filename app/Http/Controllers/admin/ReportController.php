<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //
    public function index(){
    	return view('admin.report.create');
    }

    public function saveDefultCheckboxes(Request $request){
        if ($request->isMethod('post')) {
        	$fields = array_keys($request->input());
        	unset($fields[0]);// token
        	if(!empty($fields)){
        		$report = \App\Reportchecks::find(1);
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
}
