
	
					function validateEmail(email){
						var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
						return expr.test(email);
					};
					function validatePassword(password){
						var expr = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/;
						return expr.test(password);
					};
					function validateName(name){
						var expr = /^[a-zA-Z ]{2,50}$/;
						return expr.test(name);
					};
					function validatePhoneNumber(phone_number){
						var expr = /^[0-9 ]{6,12}$/;
						return expr.test(phone_number);
					};
					function validateAddress(address){
						var expr = /^[0-9a-zA-Z ]*$/;
						return expr.test(address);
					};
					function validateCity(city){
						var expr = /^[a-zA-Z ]{2,20}$/;
						return expr.test(city);
					};
					function validatePostalCode(postal_code){
						var expr = /^[0-9]{5}$/;
						return expr.test(postal_code);
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
						$("#registersubmit").click(function(){
							if($("#registerfname").val() == "" || $("#registerlname").val() == "" || $("#registeremail").val() == "" || $("#registerpassword").val() == "" || $("#registerrepeatpassword").val() == "" || $("#registerphonenumber").val() == "" || $("#registeraddress").val() == "" || $("#registercity").val() == "" || $("#registerpostalcode").val() == ""){
								event.preventDefault();
								$("#registererror").text("Niste popunili sva polja!");
								$("#registererror").css("text-align", "center");
							}
							if($("#registerfname").val() != "" && !validateName($("#registerfname").val()) ){
								event.preventDefault();
								$("#registerfnamestar").text("Neispravan unos imena!");
								$("#registerfnamestar").css("padding", "5px");
								$("#registerfname").css("border", "1px solid #e31b23");
							}
							if($("#registerlname").val() != "" && !validateName($("#registerlname").val()) ){
								event.preventDefault();
								$("#registerlnamestar").text("Neispravan unos prezimena!");
								$("#registerlnamestar").css("padding", "5px");
								$("#registerlname").css("border", "1px solid #e31b23");
							}	
							if ($("#registeremail").val() != "" && !validateEmail($("#registeremail").val()) || $("#registeremail").val().length > 100){
								event.preventDefault();
								$("#registeremailstar").text("Neispravan unos email adrese!");
								$("#registeremailstar").css("padding", "5px");
								$("#registeremail").css("border", "1px solid #e31b23");
							}
							if ($("#registerpassword").val() != "" && !validatePassword($("#registerpassword").val())){
								event.preventDefault();
								$("#registerpasswordstar").text("Neispravan unos lozinke! Lozinka mora da sadrži najmanje 8 karaktera, od toga jedno malo slovo, jedno veliko slovo, jedan broj i bez razmaka.");
								$("#registerpasswordstar").css("padding", "5px");
								$("#registerpassword").css("border", "1px solid #e31b23");
							}else if($("#registerrepeatpassword").val() != "" && !validatePassword($("#registerrepeatpassword").val()) && $("#registerrepeatpassword").val()!=$("#registerpassword").val() ){
									event.preventDefault();
									$("#registerrepeatpasswordstar").text("Neispravan ponovni unos lozinke!");
									$("#registerrepeatpasswordstar").css("padding", "5px");
									$("#registerrepeatpassword").css("border", "1px solid #e31b23");
							}else if($("#registerpassword").val() != "" && $("#registerrepeatpassword").val() == "" ){
								event.preventDefault();
								$("#registerrepeatpasswordstar").text("Popunite polje za ponovni unos lozinke!");
								$("#registerrepeatpasswordstar").css("padding", "5px");
								$("#registerrepeatpassword").css("border", "1px solid #e31b23");
							}else if($("#registerpassword").val() == "" && $("#registerrepeatpassword").val() != "" ){
								event.preventDefault();
								$("#registerpasswordstar").text("Popunite polje za unos lozinke!");
								$("#registerpasswordstar").css("padding", "5px");
								$("#registerpassword").css("border", "1px solid #e31b23");
							}	
							if ($("#registerphonenumber").val() != "" && !validatePhoneNumber($("#registerphonenumber").val())){
								event.preventDefault();
								$("#registerphonenumberstar").text("Neispravan unos broja telefona!");
								$("#registerphonenumberstar").css("padding", "5px");
								$("#registerphonenumber").css("border", "1px solid #e31b23");
							}	
							if ($("#registeraddress").val() != "" && !validateAddress($("#registeraddress").val()) || $("#registeraddress").val().length > 50 ){
								event.preventDefault();
								$("#registeraddressstar").text("Neispravan unos adrese!");
								$("#registeraddressstar").css("padding", "5px");
								$("#registeraddress").css("border", "1px solid #e31b23");
							}	
							if ($("#registercity").val() != "" && !validateCity($("#registercity").val())){
								event.preventDefault();
								$("#registercitystar").text("Neispravan unos grada!");
								$("#registercitystar").css("padding", "5px");
								$("#registercity").css("border", "1px solid #e31b23");
							}
							if ($("#registerpostalcode").val() != "" && !validatePostalCode($("#registerpostalcode").val())){
								event.preventDefault();
								$("#registerpostalcodestar").text("Neispravan unos poštanskog broja!");
								$("#registerpostalcodestar").css("padding", "5px");
								$("#registerpostalcode").css("border", "1px solid #e31b23");
							}
						});	
					});
					