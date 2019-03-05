				
					$(document).ready(function(){
						$("#commentsubmit").click(function(){
							if($("#phonecomment").val() == ""){
								event.preventDefault();
								$("#commenterror").text("Niste uneli komentar!");
								$("#commenterror").css("text-align", "center");
								$("#phonecomment").css("border", "1px solid #e31b23");
							}else if($("#phonecomment").val().length > 2000){
								event.preventDefault();
								$("#commenterror").text("Neispravan komentar!");
								$("#commenterror").css("padding", "5px");
								$("#phonecomment").css("border", "1px solid #e31b23");
							}
						});
						$("#commentreset").click(function(){
							$("#commenterror").empty();
							$("#phonecomment").css("border", "1px solid #aaa");
						});							
					});
				