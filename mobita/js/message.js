					
					
					function validateEmail(email){
						var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
						return expr.test(email);
					};
					
					$(document).ready(function(){
						$("input").blur(function(){
							var id = "#" + $(this).attr("name") + "star"; 
							if ($(this).val()==""){
								$(id).text("*");
							}
							else {
								$(id).empty();
							}
							$("#msgreset").click(function(){
							$(id).empty();
							});	
						});
						$("textarea").blur(function(){
							var id = "#" + $(this).attr("name") + "star"; 
							if ($(this).val()==""){
								$(id).text("*");
							}
							else {
								$(id).empty();
							}
							
							$("#msgreset").click(function(){
							$(id).empty();
							$("#contacterror").empty();
							});	
						});
						
					
						$("#msgsubmit").click(function(){
							if($("#msgname").val() == "" || $("#msgemail").val() == "" || $("#msgmessage").val() == ""){
								event.preventDefault();
								$("#contacterror").text("Niste popunili sva polja!");
								$("#contacterror").css("text-align", "center");
								$("#msgname").css("border", "1px solid #e31b23");
								$("#msgemail").css("border", "1px solid #e31b23");
								$("#msgmessage").css("border", "1px solid #e31b23");
							}else{
								if($("#msgname").val().length > 50){
									event.preventDefault();
									$("#msgnamestar").text("Neispravan unos imena!");
									$("#msgnamestar").css("padding", "5px");
									$("#msgname").css("border", "1px solid #e31b23");
								}
								if (!validateEmail($("#msgemail").val())){
									event.preventDefault();
									$("#msgemailstar").text("Neispravan unos email adrese!");
									$("#msgemailstar").css("padding", "5px");
									$("#msgemail").css("border", "1px solid #e31b23");
								 }
								if($("#msgmessage").val().length > 1000){
									event.preventDefault();
									$("#msgmessagestar").text("Neispravan unos poruke!");
									$("#msgmessagestar").css("padding", "5px");
									$("#msgmessage").css("border", "1px solid #e31b23");
								}
							}
							 
							$("#msgreset").click(function(){
							$("#contacterror").empty();
							$("#msgnamestar").empty();
							$("#msgname").css("border", "1px solid #aaa");
							$("#msgemailstar").empty();
							$("#msgemail").css("border", "1px solid #aaa");
							$("#msgmessagestar").empty();
							$("#msgmessage").css("border", "1px solid #aaa");
							});	
						});	
					});
					
				