	
	
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
						$("#userupdatesubmit").click(function(){
							if($("#userupdatefname").val() == "" && $("#userupdatelname").val() == "" && $("#userupdateemail").val() == "" && $("#userupdatepassword").val() == "" && $("#userupdaterepeatpassword").val() == "" && $("#userupdatephnumber").val() == "" && $("#userupdateaddress").val() == "" && $("#userupdatecity").val() == "" && $("#userupdatepcode").val() == ""){
								event.preventDefault();
								$("#userupdatederror").text("Niste popunili nijedno polje!");
								$("#userupdatederror").css("text-align", "center");
							}
								if($("#userupdatefname").val() != "" && !validateName($("#userupdatefname").val()) ){
									event.preventDefault();
									$("#userupdatefnamestar").text("Neispravan unos imena!");
									$("#userupdatefnamestar").css("padding", "5px");
									$("#userupdatefname").css("border", "1px solid #e31b23");
								}
								if($("#userupdatelname").val() != "" && !validateName($("#userupdatelname").val()) ){
									event.preventDefault();
									$("#userupdatelnamestar").text("Neispravan unos prezimena!");
									$("#userupdatelnamestar").css("padding", "5px");
									$("#userupdatelname").css("border", "1px solid #e31b23");
								}
								if ($("#userupdateemail").val() != "" && !validateEmail($("#userupdateemail").val()) || $("#userupdateemail").val().length > 100){
									event.preventDefault();
									$("#userupdateemailstar").text("Neispravan unos email adrese!");
									$("#userupdateemailstar").css("padding", "5px");
									$("#userupdateemail").css("border", "1px solid #e31b23");
								}
								if ($("#userupdatepassword").val() != "" && !validatePassword($("#userupdatepassword").val())){
									event.preventDefault();
									$("#userupdatepasswordstar").text("Neispravan unos lozinke! Lozinka mora da sadrži najmanje 8 karaktera, od toga jedno malo slovo, jedno veliko slovo, jedan broj i bez razmaka.");
									$("#userupdatepasswordstar").css("padding", "5px");
									$("#userupdatepassword").css("border", "1px solid #e31b23");
								}else if($("#userupdaterepeatpassword").val() != "" && !validatePassword($("#userupdaterepeatpassword").val()) && $("#userupdaterepeatpassword").val()!=$("#userupdatepassword").val()){
										event.preventDefault();
										$("#userupdaterepeatpasswordstar").text("Neispravan ponovni unos lozinke!");
										$("#userupdaterepeatpasswordstar").css("padding", "5px");
										$("#userupdaterepeatpassword").css("border", "1px solid #e31b23");
								}else if($("#userupdatepassword").val() != "" && $("#userupdaterepeatpassword").val() == ""){
									event.preventDefault();
									$("#userupdaterepeatpasswordstar").text("Popunite polje za ponovni unos lozinke!");
									$("#userupdaterepeatpasswordstar").css("padding", "5px");
									$("#userupdaterepeatpassword").css("border", "1px solid #e31b23");
								}else if($("#userupdatepassword").val() == "" && $("#userupdaterepeatpassword").val() != "" ){
									event.preventDefault();
									$("#userupdatepasswordstar").text("Popunite polje za unos lozinke!");
									$("#userupdatepasswordstar").css("padding", "5px");
									$("#userupdatepassword").css("border", "1px solid #e31b23");
								}
								if ($("#userupdatephnumber").val() != "" && !validatePhoneNumber($("#userupdatephnumber").val())){
									event.preventDefault();
									$("#userupdatephnumberstar").text("Neispravan unos broja telefona!");
									$("#userupdatephnumberstar").css("padding", "5px");
									$("#userupdatephnumber").css("border", "1px solid #e31b23");
								}
								if ($("#userupdateaddress").val() != "" && !validateAddress($("#userupdateaddress").val()) || $("#userupdateaddress").val().length > 50 ){
									event.preventDefault();
									$("#userupdateaddressstar").text("Neispravan unos adrese!");
									$("#userupdateaddressstar").css("padding", "5px");
									$("#userupdateaddress").css("border", "1px solid #e31b23");
								}	
								if ($("#userupdatecity").val() != "" && !validateCity($("#userupdatecity").val())){
									event.preventDefault();
									$("#userupdatecitystar").text("Neispravan unos grada!");
									$("#userupdatecitystar").css("padding", "5px");
									$("#userupdatecity").css("border", "1px solid #e31b23");
								}
								if ($("#userupdatepcode").val() != "" && !validatePostalCode($("#userupdatepcode").val())){
									event.preventDefault();
									$("#userupdatepcodestar").text("Neispravan unos poštanskog broja!");
									$("#userupdatepcodestar").css("padding", "5px");
									$("#userupdatepcode").css("border", "1px solid #e31b23");
								}
						});	
					});
					