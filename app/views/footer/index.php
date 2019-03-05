<script>
	var div = document.getElementById("showcart");
	var btn = document.getElementById("numb");
	if(btn!=undefined) btn.addEventListener("mouseover", start);
	
	function start(){
		idIntervala = setInterval(showDiv, 100);
	}
	function showDiv(){
		setTimeout(hideDiv, 7000);
		div.setAttribute("style", "display:block");
	}
	
	function hideDiv(){
		div.setAttribute("style", "display:none");
		clearInterval(idIntervala);
	}
</script>
	<footer> 
            <p>MobITA Copyright &copy; Goran Ciganović 2016</p>
        </footer>
	</body>
</html>

