(function(jQuery,W,D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                //form validation rules
                jQuery("#contact").validate({
                    rules: {
                        name: "required" ,
                        message: "required" ,                       
                        email: {
							required: true,
							email: true,                            
                         },

                    },
                    messages: {
                       name: "Please enter name." ,
                        message:  "Please enter message."  ,
                        email: {
                            required: "Please enter your email address.",
                            email: "Please enter a valid email address.",
                        
                        },
                    },
                    submitHandler: function(form) {

                          contact_form();
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
	
       function contact_form(){
		
            jQuery(".preloader").show();          
            var data = new FormData(jQuery("#contact")[0]);
            jQuery.ajax({
                type:"POST",
                url:'/contact',
                data:data,
                processData: false,
                contentType: false,
                success: function(data){
					
                    //var data = JSON.parse(data);
						
                        jQuery(".preloader").hide();
                        if(data.success){
							
                            jQuery("#msg").html('<div class="alert alert-success">'+data.message+'</div>');
                            document.getElementById("contact").reset();
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
   


