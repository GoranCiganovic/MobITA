
function validateEmail(email){
						var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
						return expr.test(email);
					};
					function validatePassword(password){
						var expr = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/;
						return expr.test(password);
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
					
						$("#logsubmit").click(function(){
							if($("#logemail").val() == "" || $("#logpassword").val() == ""){
								event.preventDefault();
								$("#loginerror").text("Niste popunili polja!");
								$("#loginerror").css("text-align", "center");
								$("#logemail").css("border", "1px solid #e31b23");
								$("#logpassword").css("border", "1px solid #e31b23");
							}else{
								if(!validateEmail($("#logemail").val())){
									event.preventDefault();
									$("#logemailstar").text("Neispravan unos email adrese!");
									$("#logemailstar").css("padding", "5px");
									$("#logemail").css("border", "1px solid #e31b23");
								}
								if(!validatePassword($("#logpassword").val())){
									event.preventDefault();
									$("#logpasswordstar").text("Neispravan unos lozinke!");
									$("#logpasswordstar").css("padding", "5px");
									$("#logpassword").css("border", "1px solid #e31b23");
								}
							}
						});	
						
					});