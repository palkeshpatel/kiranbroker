<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\SendEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $emails=SendEmail::select(DB::raw('count(to_email) as to_email'),'batch_no','description','subject','brochure')->groupBy('brochure','batch_no','subject','description')->get();

        return view('vendor.voyager.send-emails.browse',compact('emails'));
    }

    public function email()
    {
        $user=UserDetail::get();
        $batch_no = $this->getBatchNo();
        return view('vendor.voyager.email.email', compact('user','batch_no'));
    }

    protected function getBatchNo()
    {
        $batch_no = SendEmail::orderBy('id', 'desc')->limit(1)->first();
        $batch_no=(!$batch_no)?'1':$batch_no->batch_no+1;
        return  $batch_no;
    }

    public function store(Request $req)
    {

        $count_send  = SendEmail::where('batch_no',$req->batch_no)->count();

        $email=new SendEmail;
        if($req->hasfile('brochure'))
        {
            $brochure =$req->file('brochure')->getClientOriginalName();
            $path = $req->file('brochure')->storeAs('brochures', $brochure, 'public');
            $email->brochure=$path;
        }
        $email->to_email=$req->to_email;
        $email->subject=$req->subject;
        $email->description=$req->description;
        $email->batch_no=$req->batch_no;
        $email->save();

        if($req->hasfile('brochure')){
            $data = array(
            'to_email' => $req->to_email,
            'brochure' => $path,
            'description' => $req->description,
            'subject' => $req->subject,
            );
            Mail::send('vendor.voyager.email.sendemail', $data, function($message)use($data)
        {
            $message->to($data["to_email"])
                    ->subject($data["subject"])
                    ->attach("storage/".$data["brochure"]);
            });
        }
        else{
			
            $data = array(
            'to_email' => $req->to_email,
            'description' => $req->description,
            'subject' => $req->subject,
            );
			
			
           $r = Mail::send('vendor.voyager.email.sendemail', $data, function($message)use($data)
        {
            $message->to($data["to_email"])
                    //->cc('patel.palkesh@gmail.com')                    
                    ->bcc('urja.patel@fortiustechsolutions.com')
					->subject($data["subject"]);
            });
        }
        
        return response()->json(["success" => "Email Send Successfully","count_send"=>$count_send]);
    }
    public function show($batch_no)
    {
         $emails=SendEmail::where('batch_no',$batch_no)->select(DB::raw('group_concat(to_email) as to_email'),'batch_no','description','subject','brochure')->groupBy('brochure','batch_no','subject','description')->first();

        return view('vendor.voyager.send-emails.show', compact('emails'));
    }
    public function destroy($batch_no)
    {
        SendEmail::where('batch_no',$batch_no)->delete();

         return redirect()->back();

    }
}