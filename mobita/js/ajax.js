	function ajaxFunction(){
			var xhr;
			try{
				xhr = new XMLHttpRequest();
			}catch(e){
				try{
				xhr = new ActiveXObject('Msxml2.XMLHTTP'); 
				}catch(e){
					try{
						xhr = new ActiveXObject('Microsoft.XMLHTTP');
					}catch(e){
						alert('Vaš pregledač ne podrzžava AJAX.');
						return false;
					}
				}
			}
			return xhr;
		}
		
	
	