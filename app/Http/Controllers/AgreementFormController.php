<?php

namespace App\Http\Controllers;

use App\Models\AgreementForm;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use \PDF;
use App\Models\PropertyClass;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\Inquiry;
use App\Models\DownloadBrochure;
use Illuminate\Support\Facades\Session;
use App\Models\ProjectMaster;
class AgreementFormController extends  \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    //
    public function check_email(Request $request){
        $result= AgreementForm::where('email',$request->input('email'))->where('property_id',$request->input('property_id'))->get();

        if($result->isEmpty()){
            return 'true';
        }else{
            return 'false';
        }
    }


    public function send_brochure(Request $request){


        $property=Property::where('id',$request['property_id'])->first();

		$brochure=json_decode($property->brochure,false);
		$brochure=(!empty($brochure))?storage_path('app/public/').$brochure[0]->download_link:'';
        $data=['email'=>'patel.palkesh@gmail.com','client_name'=>'Palkesh','brochure'=>$brochure];
		if (file_exists($data['brochure'])) {
             Mail::send('emails.send_brochure', $data, function($message)use($data) {
				$message->to($data["email"], $data["client_name"])
				->subject("Confidential Agreement")
						   ->attach($data['brochure'], [
					'as' => 'Confidential-Agreement.pdf',
					'mime' => 'application/pdf',
			   ]);
			});
			return ['message'=>'brochure send to the client.'];
        } else {
			return ['message'=>'Sorry No brochure atthed with this property.'];
        }


    }
    function addOrdinalNumberSuffix($num) {
        if (!in_array(($num % 100),array(11,12,13))){
          switch ($num % 10) {
            // Handle 1st, 2nd, 3rd
            case 1:  return $num.'st';
            case 2:  return $num.'nd';
            case 3:  return $num.'rd';
          }
        }
        return $num.'th';
      }
      function BindSignatureText($request, $homepage){

        $name=$request->first_name." ".$request->last_name;
        $homepage= str_replace("_______ day of _____________, 20______ and shall",$this->addOrdinalNumberSuffix(date('d'))." day of ".date('M').", ".date('Y')." and shall",$homepage);
        $homepage= str_replace("Signature :    _____________________________________","Signature :    ".(($request->sign_initial=="")?'_____________________________________':$request->sign_initial),$homepage);
        $homepage= str_replace("Date: _________________________","Date: ".date('m/d/Y'),$homepage);
        $homepage= str_replace("Name(Print) :  _____________________________________","Name(Print) :  ".((trim($name)=="")?'_____________________________________':$name),$homepage);
        $homepage= str_replace("Address :      _________________________________________________________________________","Address :      ".(($request->address=="")?'_____________________________________':$request->address),$homepage);
        $homepage= str_replace("City :         _______________________________","City :         ".(($request->city=="")?'_____________________________________':$request->city),$homepage);
        $homepage= str_replace("State : __________","State : ".(($request->state=="")?'__________':$request->state),$homepage);
        $homepage= str_replace("Zip : __________________","Zip : ".(($request->zip_code=="")?'__________________':$request->zip_code),$homepage);
        $homepage= str_replace("Phone :        ________________________________________________","Phone :        ".(($request->phone=="")?'________________________________________________':$request->phone),$homepage);
        $homepage= str_replace("Email :        ________________________________________________","Email :        ".(($request->email=="")?"________________________________________________":$request->email),$homepage);


        return $homepage;
    }
    public function get_signature(Request $request){

        $ConfidentialStatement=view('AgreementForm.signature')->render();
        $ConfidentialStatement=$this->BindSignatureText($request,$ConfidentialStatement);


        return ['result'=>true,'ConfidentialStatement'=> $ConfidentialStatement];


    }

    public function store(Request $request)
    {
         $slug = 'agreement-form';
         $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
       //  $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->has('_validate')) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {

                $this->send_mail($request,$request->confidential_statement);
                return response()->json(['success' => true, 'data' => $data,'message'=>'Thank you we will contact you shortly.']);
            }

            return 'ok';
        }
    }



    protected function bindPdf($id){
        $pdfHtml = view('AgreementForm.confidential')->render();

        // $pdf=PDF::loadHTML($pdfHtml)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');
       $pdf = PDF::setOptions(['logOutputFile' => null,])->loadView('AgreementForm.confidential');
    //    dd($pdf);
        return $pdf->output();
    }
    public function send_mail(Request $request){
        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("first_name").' '.$request->get("last_name");
        $data["subject"]=$request->get("subject");
       // $pdfHtml= str_replace("pre>","p>",$request->confidential_statement);
        $confidential_statement=  $request->confidential_statement;
        $confidential_statement=    str_replace("<pre>","",$confidential_statement);
        $pdfHtml=  str_replace("</pre>","",$confidential_statement);
        $pdf=PDF::loadHTML($pdfHtml)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf');

        $message=array('');
        Mail::send('emails.client', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject("Thank you for signing Confidential Agreement")->attachData($pdf->output(),  date('d-M-Y')."Confidential-Agreement.pdf");
            });

        Mail::send('emails.admin', $data, function($message)use($data,$pdf) {
                $message->to('info@kiranbroker.com', $data["client_name"])
                ->subject("Confidential Agreement")
                ->attachData($pdf->output(), date('d-M-Y')."Confidential-Agreement.pdf");
        });
    // dd(1);
    }
	public function property($property_class){
		  $reult='sorry';
		$all_property_class=PropertyClass::all()->pluck('title','id');
		foreach($all_property_class as $key=>$rw){
			if ($property_class== $rw)
			{
				 $collection= Property::
				select('name','location','consultant','Amount','is_status','Image','brochure'
				,'property_class.title as property_class_title'
				,'property_status.title as property_status_title'
				,'property_type.title as property_type_title'
				)
				->leftJoin('property_class', 'property_class.id', '=', 'property.property_class_id')
				->leftJoin('property_status', 'property_status.id', '=', 'property.propertie_status_id')
				->leftJoin('property_type', 'property_type.id', '=', 'property.property_type')
				->where('property_class_id',$key)->get();
			}
		  }

		$myObj= array("title"=>"","meta_description"=>"","image"=>"","body"=>"pp");
		$myArray = json_decode(json_encode($myObj), false);

		return view('vendor.voyager-frontend.pages.property',['page'=>$myArray,'collection'=>$collection]);
	}

	 public function contact(Request $request){
        $result=['status'=>'','message'=>''];
        if($this->recapch( $request)){
            $contact = new Contact();
            $contact->name =$request->name;
            $contact->email = $request->email;
            $contact->message =$request->message;
            $contact->created_at = date('Y-m-d h:i:s');
            $contact->save();

			$data = array('name'=>$request->name,'email'=>$request->email,'text'=>$request->message);
			  Mail::send('emails.contact', $data, function($message) {
				 $message->to('info@kiranbroker.com')->subject
					('New contact');

			  });


            $result['success']=true;
             $result['message']="Thank you for inquiry we will get in touch with you shortly.";
            return $result;
        }else{
            $result['success']=false;
            $result['message']="Recapcha Issues";
            return $result;
        }


    }
    public function inquiry(Request $request){
		 $result=['status'=>'','message'=>''];
        if($this->recapch( $request)){
            $inquiry = new Inquiry();
            $inquiry->name =$request->name;
            $inquiry->phone = $request->country_codes.$request->phone;
            $inquiry->email = $request->email;
            $inquiry->services = $request->services;
            $inquiry->created_at = date('Y-m-d h:i:s');
            $inquiry->message =$request->message;
            $inquiry->save();

			  $data = array('name'=>$request->name,'phone'=>$request->country_codes.$request->phone,'email'=>$request->email,'services'=>$request->services,'text'=>$request->message);
			  Mail::send('emails.inquiry', $data, function($message) {
				 $message->to('info@kiranbroker.com')->subject
					('New Inquiry');

			  });

			$result['success']=true;
            $result['message']="Thank you for inquiry we will get in touch with you shortly.";
        }else{
			 $result['success']=false;
            $result['message']="Recapcha Issues";

		}
		return $result;
    }

    private function recapch( $request){
       return true;
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
		$recaptcha_secret ="6LcL9bUZAAAAAH__IyiTGCbeuzchAaD9J5LlUKFN";
		$recaptcha_response =  $request->recaptcha_response;

		$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

		$recaptcha = json_decode($recaptcha);

		// Take action based on the score returned:

		if (($recaptcha->success >= 0.5)) {
				//continue
            return false;

		}else{
            return true;
			//echo json_encode(array('result'=>false,'message'=>'Sorry not a valid captcha'));
		}

    }


	 public function create_brochure(Request $request){
        $property = Property::where('name',$request->subject)->first();
		if(empty($property)){
			$property = ProjectMaster::where('slug',$request->subject)->first();
		}
		return view("AgreementForm.brochure",compact('property'));
	 }

	 public function store_brochure(Request $request)
    {
		// if($request->otp =! Session::get('otp')){
        //  return response()->json(['error' => true, 'data' => [],'message'=>'otp is invalid']);
        // }
		$download_brochure = new DownloadBrochure();

        $download_brochure->first_name = $request->first_name;
        $download_brochure->last_name = $request->last_name;
        $download_brochure->email = $request->email;
        $download_brochure->phone = $request->phone;
        // $download_brochure->phone = $request->country_codes . $request->phone;
        $download_brochure->otp = $request->otp;
        $download_brochure->address = $request->address;
        $download_brochure->country = $request->country;
        $download_brochure->state = $request->state;
        $download_brochure->zip_code = $request->zip_code;
        $download_brochure->subject = $request->subject;
        $result= $download_brochure->save();
		if($result){
			return response()->json(['success' => true, 'data' => [],'message'=>'Thank you we will contact you shortly.']);
		}

    }
    protected $email;
    public function sendotp(Request $request){
        $otp = rand(100000, 999999);
        // DownloadBrochure::where(['id' => $req->id])->update([
        //     'otp' => $otp,
        // ]);
        // $data = array('otp'=>$otp);

    //   Mail::send(['text'=>'mail'], $data, function($message) {
    //      $message->to('urja.patel@fortiustechsolutions.com')->subject
    //         ('Otp Verification');
    //     //  $message->from('xyz@gmail.com','Virat Gandhi');
    //   });
        // Mail::raw('Your Verification code is '.$otp, function($msg) {
        //     $msg->to('urja.patel@fortiustechsolutions.com')
        //     ->subject('Otp Verication');
        // });
        // dd($request->email);
        $this->email =$request->email;
        Mail::raw('Your Verification code is '.$otp, function($msg) {
            $msg->to($this->email)
            ->subject('OTP Verication');
        });
        Session::put('otp', $otp);
    }
}
