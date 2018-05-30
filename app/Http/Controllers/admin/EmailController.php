<?php

namespace App\Http\Controllers\admin;

use App\Email_template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function index(){
        $emails = Email_template::all();
        return view('admin.emails.email_listing')->with(compact('emails'));
    }
    public function getTemplate($id){
        $email_template = Email_template::find($id);
        return view('admin.emails.edit_template')->with(compact('email_template'));
    }
    public function updateTemplate(Request $request,$id){
        $html = htmlspecialchars($request->temp);
        $template = Email_template::find($id);
        $template->name = $request->name;
        $template->subject = $request->subject;
        $template->help = $request->help;
        $template->body = $html;
        $template->save();
        return redirect('admin/emails');
    }
}
