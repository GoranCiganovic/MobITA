
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
						});
					
						$("#forgotsubmit").click(function(){
							if($("#forgotemail").val() == ""){
								event.preventDefault();
								$("#forgoterror").text("Niste popunili polje!");
								$("#forgoterror").css("text-align", "center");
								$("#forgotemail").css("border", "1px solid #e31b23");
							}else{
								if(!validateEmail($("#forgotemail").val())){
									event.preventDefault();
									$("#forgotemailstar").text("Neispravan unos email adrese!");
									$("#forgotemailstar").css("padding", "5px");
									$("#forgotemail").css("border", "1px solid #e31b23");
								}
							}
						});	
						
					});