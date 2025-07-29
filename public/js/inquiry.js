
    (function(jQuery,W,D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                //form validation rules
                jQuery("#inquiry").validate({
                    rules: {
                        name: "required" ,
                        phone: "required" ,                       
                        message: "required" ,              
                        services: "required" ,                       
                        email: {
							required: true,
							email: true,                            
                         },

                    },
                    messages: {
                        name: "Please enter name." ,
                        phone:  "Please enter phone."  ,
						message:  "Please enter message."  ,
                        services:  "Please enter services."  ,
                       
                        email: {
                            required: "Please enter your email address.",
                            email: "Please enter a valid email address.",
                        
                        },
                    },
                    submitHandler: function(form) {

                          inquiry_form();
                        return false;
                        //form.submit();
                    }
                });


                return false;
            }
        }

    
        jQuery(D).ready(function(jQuery) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
	
       function inquiry_form(){
		
            jQuery(".preloader").show();          
            var data = new FormData(jQuery("#inquiry")[0]);
		
		    jQuery("input[name='country_codes']").val($(".iti__selected-dial-code").html());
            jQuery.ajax({
                type:"POST",
                url:'/inquiry',
                data:data,
                processData: false,
                contentType: false,
                success: function(data){
					
                    //var data = JSON.parse(data);
						
                        jQuery(".preloader").hide();
                        if(data.success){
							
                            jQuery("#msg").html('<div class="alert alert-success">'+data.message+'</div>');
                            document.getElementById("inquiry").reset();
							window.location.href='#main';
                        }else{
                            jQuery("#msg").html('<div class="alert alert-danger">'+data.message+'</div>');
                            window.location.href='#main';
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
   


