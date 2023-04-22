 $(document).ready(
	function() {    
	
	   $(document).on("click", ".submit-button", function(e){
				e.preventDefault();
					//alert($.trim($("#book_name").val())); 
				if ($.trim($("#book_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#book_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#book_name").offset().top - 100},
                    'slow');
            return false;
        } else{
			
			$("form#search_form").attr("action", "home/book_search");
            $("form#search_form").submit();
		}
			//alert("here");
		});
	
	   $(document).on("click", ".register", function(e){
				e.preventDefault();
				  $(".form-field").css("border-bottom","1px solid #c9c9c9");
					//alert($.trim($("#first_name").val())); 
				if ($.trim($("#first_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#first_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#first_name").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#last_name").val()) == "") {
            $("#last_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#last_name").offset().top - 100},
                    'slow');
            return false;
        }else if($.trim($("#user_email").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_email").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_email").offset().top - 100},
                    'slow');
            return false;
        } else if($.trim($("#user_name").val()) == "") {
				//	alert("we are here");  exit;
            $("#user_name").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#user_name").offset().top - 100},
                    'slow');
            return false;
        } else if ($.trim($("#password").val()) == "") {
				//	alert("we are here");  exit;
            $("#password").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#password").offset().top - 100},
                    'slow');
            return false;
        } else if ($.trim($("#password").val()) == "") {
				//	alert("we are here");  exit;
            $("#password").css("border-bottom","1px solid #ff0000");
            $('html,body').animate({
                    scrollTop: $("#password").offset().top - 100},
                    'slow');
            return false;
        }else{
			
			$("form#registration-form").attr("action", "registration/save_reg_user");
            $("form#registration-form").submit();
		}
			//alert("here");
		});

		
	
		
		
		});

		
		
		