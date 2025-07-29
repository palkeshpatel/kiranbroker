
@extends('layouts.default')
@section('content')

<section class="inner-banner-img">
    <div class="container">
    <div class="row d-flex">
    <div class="col-lg-12 col-md-12 col-sm-12">Download Brochure</div>
    </div>
    </div>
</section>
<section class=" position-relative padding_half noshadow">
    <div class="container">
        <div class="col-md-8 offset-md-2 mb-5">
			<div class="card">
				<div class="card-body">
					<form id="download_brochure" class="getin_form">
							<div id="msg"></div>
						<div class="row">
                            @php
                                $property_brochure = json_decode($property['brochure'], true);
                            @endphp
                            <input type="hidden" name="brochure" id="brochure" value="{{$property_brochure['0']['download_link']}}">
							<input type="hidden" name="subject" value="{{app('request')->input('subject')}}">
							<div class="col-md-6 form-group">
								<label>First Name *</label>
								<input type="text" class="form-control" name="first_name">
								<input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="task" value="">
							 </div>
							 <div class="col-md-6 form-group">
								<label>Last Name *</label>
								<input type="text" class="form-control" name="last_name">
							 </div>
							 <div class="col-md-6 form-group">
								<label>Email address *</label>
								<div class="email_verify_btn">
									<input type="email" class="form-control" name="email" id="email">
									<!--<a href="#" id="send_otp" class="btn btn-primary">Send OTP</a>-->
									<!--<a href="#" class="btn btn-success">Verified</a>-->
								</div>
							 </div>
							  <!--<div class="col-md-6 form-group">
								<label>OTP (Please check your email for otp)*</label>
								<input type="text" class="form-control" name="otp" >
							 </div>-->
							 <div class="col-md-6 form-group">
								<label>Phone *</label>
								<input type="text" class="form-control" name="phone" onkeypress="return isNumber(event)" oncopy="return false" onpaste="return false">
							 </div>

							 <div class="col-md-6 form-group">
								<label>Address 1 *</label>
								<input class="form-control" name="address">
							 </div>
							

							
							 <input type="hidden" name="recaptcha_response" id="recaptchaResponse" value="03AGdBq27om4NmcUyZxZxT3c3skehqgh_q6IO2gIx7MxjPROanx_egAJ9baeExYN2589X0uwkHzvY4jGsFaGP6CDlSi1Z1w0kXjK4NvU2b4_I_jZxkrak3Utit9VqJNuarMsf0U9t9CFSsoGppk3ZMkPYqzKOzsJx9OZybGawuXOTJtQGb7tvNKzeaxdTkQYI4puPjr8r7ZKeL7btRAvY2942sIoqejYBM3ZNmCaDpdcVtjaZtyILUXEa5TOYBo-kqwoaOeBsJFwHn-mSZtSGlar6eLmhfhz1JLIoCJ2EAyn1Rfl1RP_FX1FR_GH7OGbkbeJrOIs2piQWHBq2DPkoo-B65_NfNkYWdfpZQwG4ZKa8E0zNEIEmbszRUh8pU4abc7o8haAwAPaLnvy4Y4cShSbjJKlRcyfnLhZZ-J81wksKiKCrVW7dtvHSnIuC3e0NYGNTdz0ML5LBrKUNGvQeVu2PcAwMlrvztRw">
							 <div class="col-md-12">
								<div class="checkbox"  style="display:none">
									 <div class="form-group">
										 <input type="checkbox" checked id="TermsConditions" name="terms_conditions" value="1" onclick="CallConfidentialStatement('get')"> <span>I have read and agree to the terms &amp; conditions</span>
									 </div>
								</div>
								<button id="frm-submit" type="submit" class="button gradient-btn">SUBMIT</button>
							 </div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</section>

<!-- Modal -->
<div id="Confidential-Statement" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Confidential Statement</h4>
        </div>
        <div class="modal-body" id="Confidential-Statement-view" style="text-align: justify;">

        </div>
        <div class="modal-footer">
          <button type="button" id="btn-ok" class="btn btn-info" onclick="CallConfidentialStatement('ok')" >OK</button>
          <button type="button" class="btn btn-danger" onclick="CallConfidentialStatement('cancel')" >Cancel</button>
        </div>
      </div>

    </div>
  </div>
@stop
@section('script')
<script>
    (function(jQuery,W,D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                //form validation rules
                jQuery("#download_brochure").validate({
                    rules: {
                        first_name: "required" ,
                        last_name: "required" ,
                        terms_conditions: "required" ,
                        phone: {
                            required: true,
                            minlength: 10
                        },
                        email: {
                        required: true,
                        email: true,
                            // remote: {
                            //     url: "/check-email",
                            //     type: "post",
                            //     data: {
                            //         email: function() {
                            //             return $("#download_brochure input[name='email']").val();
                            //         },property_id: function() {
                            //             return $("#download_brochure select[name='property']").val();
                            //         },_token: function() {
                            //             return "{{ csrf_token() }}";
                            //         } ,
                            //     },
                            // }
                         },city: {
                            required: true,
                        },state : {
                            required: true,
                        },address: {
                            required: true,
                        },zip_code: {
                            required: true,
                        },sign_initial: {
                            required: true,
                        },

                    },
                    messages: {
                        first_name: "First name required." ,
                        last_name:  "Last name required." ,
                        city:  "City required." ,
                        state :  "State  required." ,
                        address:  "Address required." ,
                        zip_ode:  "ZIP code required." ,
                        sign_initial:  "Sign initial required." ,
                        terms_conditions:  "Please select terms & conditions." ,
                        phone: {
                            required: "Phone required.",
                            minlength: "Please provide a valid mobile number"
                        },
                        email: {
                            required: "Please enter your email address.",
                            email: "Please enter a valid email address.",
                            remote: "Sorry with this email with this property already signed form!"
                        },
                    },
                    submitHandler: function(form) {

                        submit_form();
                        return false;
                        //form.submit();
                    }
                });


                return false;
            }
        }

    //jQuery("#trid"+i+" .checkeditor").rules('add', { required: true , messages: { required: "Please Select Editor", } });
        //when the dom has loaded setup form validation rules
        jQuery(D).ready(function(jQuery) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
	
    function submit_form(){
		
            jQuery(".preloader").show();
            jQuery("#download_brochure input[name='task']").val('agreement_form');
            var data = new FormData(jQuery("#download_brochure")[0]);
            jQuery.ajax({
                type:"POST",
                url:'/store-download-brochure',
                data:data,
                processData: false,
                contentType: false,
                success: function(data){
					
                    //var data = JSON.parse(data);
						
                        jQuery(".preloader").hide();
                        if(data.success){
							
                            jQuery("#msg").html('<div class="alert alert-success">'+data.message+'</div>');
                            document.getElementById("download_brochure").reset();
                            $("#msg").hide(10000);
                            window.open('/storage/'+$("#brochure").val(),'_blank');
							// window.open('/storage/property/August2022/mpDQl1agPHzdHE9oSuhS.pdf', '_blank');
                            // window.location.href='#main';
                            // window.location.href = "/storage/property/August2022/mpDQl1agPHzdHE9oSuhS.pdf";
                            // var link = document.createElement('a');
                            // link.href = "https://kiranbroker.com/storage/property/August2022/mpDQl1agPHzdHE9oSuhS.pdf";
                            // link.download = 'mpDQl1agPHzdHE9oSuhS.pdf';
                            // link.dispatchEvent(new MouseEvent('click'));
                        }else{
                            jQuery("#msg").html('<div class="alert alert-danger">'+data.message+'</div>');
                            window.location.href='#main';
                            $("#msg").hide(10000);
                        }

                }
            });
            return false;
    }
    function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

    function CallConfidentialStatement(para,data){
     var checkBox = document.getElementById("TermsConditions");
      if(para=='get'){
          if (checkBox.checked == true){
            GetTextConfidentialStatement();
            jQuery("#Confidential-Statement").modal();
          }
          checkBox.checked  =false;
          jQuery("#frm-submit").trigger("submit");
            var fields = jQuery('input.error');
            if(fields.length > 1){
                 jQuery('#btn-ok').prop('disabled', true);
            }else{
                jQuery('#btn-ok').removeAttr("disabled");
            }

      }
     if(para=="ok"){
      jQuery("#Confidential-Statement").modal('hide');
      jQuery("#TermsConditions-error").html('');
      checkBox.checked  =true;
     }
     if(para=="cancel"){
      jQuery("#Confidential-Statement").modal('hide');
      checkBox.checked  =false;
      jQuery(".preloader").hide();
     }
    }
    function GetTextConfidentialStatement(){
		jQuery(".preloader").show();
		jQuery("#download_brochure input[name='task']").val('GetModalText');

		var data = new FormData(jQuery("#download_brochure")[0]);
		jQuery.ajax({
            type:"POST",
            url:'/get-signature',
            data:data,
			processData: false,
			contentType: false,
            success: function(data){
				//var data = JSON.parse(data);
					jQuery(".preloader").hide();
					if(data.result){
						jQuery("#Confidential-Statement-view").html(data.ConfidentialStatement);
						jQuery("#download_brochure textarea[name='confidential_statement']").val(data.ConfidentialStatement);
						jQuery(".preloader").hide();
					}
            }
        });
		return false;
}
// send otp on email
    // $("#send_otp").click(function(){
    //     $.get("/download-brochure-sendotp?email="+$('#email').val(), function(){
    //         alert("OTP send on email");
    //     });
    // });

    </script>
@stop