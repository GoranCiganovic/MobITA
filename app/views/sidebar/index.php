<?php // echo rand(0,100);  ?>
	<script>
		function GetRequest(input) {
			var xhttp = ajaxFunction();							
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					document.getElementById("main").innerHTML = xhttp.responseText;
				}
			};
			var filter = "<?php URL ?>/ajax/index/" + input;
											
			xhttp.open("GET", filter, true);
			xhttp.send();
		}
	</script>
    <div id="logo">
        <a href="<?php URL ?>/home/index/"><img src="<?php PATH ?>/img/logo.png" alt="logo"/></a>
    </div>
    <div id="head_text">
        <ul>
            <li>Garancija 24 meseca</li>
            <li>Isporuka na celoj teritoriji Srbije</li>
        </ul>
    </div>
    <div id="date"><?php echo $date; ?></div>
	<div id="login">
        <ul>
            <li><?php echo $log; ?></li>
            <li><?php echo $profile; ?></li>
            <li><?php echo $cart; ?></li>
        </ul>
	</div>
	<div id="showcart">Imate proizvod u korpi</div>
    <nav>
        <ul>
            <li><a href="<?php URL ?>/home/index/">Početna</a></li>
            <li><a href="<?php URL ?>/home/phones/">Telefoni</a></li>
            <li><a href="<?php URL ?>/home/links/">Linkovi</a></li>
            <li><a href="<?php URL ?>/home/about_us/">O nama</a></li>
            <li><a href="<?php URL ?>/home/contact/">Kontakt</a></li>
        </ul>
        <div id="input">
            <div class="btnr"><input  type="text" name="search" id="search" placeholder="Pretraga" oninput="GetRequest(this.value)"></div>
        </div>
		
		<div id="welcome"><?php if($name=Session::get("first_name")){ ?>Dobro došli: <?php echo $name;} ?></div>
    </nav>
</header>
<div id="wrapper">
    <section id="sidebar">
        <form action="<?php URL ?>/home/filter/" method="POST" onclick="SidebarFilter()" >
            <input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Proizvođač</h4>
                <?php foreach ($brands as $brand) { ?>
                    <ul><li><label><input type="checkbox" name="brands[]" value="<?php echo $brand->id ?>"><?php echo $brand->name; ?></label></li></ul><?php } ?>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4 >Cena</h4>
                <ul> 
                    <li><label><input type="checkbox" name="prices1" >Do 20 000din</label></li>
                    <li><label><input type="checkbox" name="prices2">Od 20 000din do 60 000din</label></li>
                    <li><label><input type="checkbox" name="prices3">Preko 60 000din</label></li>
                </ul>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model">
            <div class="filter"><h4>Operativni sistem</h4>
                <?php foreach ($systems as $system) { ?>
                    <ul><li><label><input type="checkbox" name="systems[]" value="<?php echo $system->id; ?>"><?php echo $system->name; ?></label></li></ul><?php } ?>

            </div>
            <input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Veličina ekrana</h4>
                <ul>
                    <li><label><input type="checkbox" name="screens1" >Do 3.8"</label></li>
                    <li><label><input type="checkbox" name="screens2" >Od 3.8" do 5.0"</label></li>
                    <li><label><input type="checkbox" name="screens3" >Preko 5.0"</label></li>
                </ul>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Radna memorija</h4>
                <?php foreach ($rams as $ram) { ?>
                    <ul><li><label><input type="checkbox" name="rams[]" value="<?php echo $ram->id ?>"><?php echo $ram->name; ?></label></li></ul><?php } ?>
            </div>
            <input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Interna memorija</h4>
                <?php foreach ($ints as $int) { ?>
                    <ul><li><label><input type="checkbox" name="ints[]" value="<?php echo $int->id ?>"><?php echo $int->name; ?></label></li></ul><?php } ?>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>SIM slot</h4>
                <?php foreach ($sims as $sim) { ?>
                    <ul><li><label><input type="checkbox" name="sims[]" value="<?php echo $sim->id ?>"><?php echo $sim->name; ?></label></li></ul><?php } ?>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Boja</h4>
                <?php foreach ($colors as $color) { ?>
                    <ul><li><label><input type="checkbox" name="colors[]" value="<?php echo $color->id ?>"><?php echo $color->name; ?></label></li></ul><?php } ?>
            </div>
			<input class="sbt" type="submit" name="submit" value="Pronađi model" >
            <div class="filter"><h4>Zadnja kamera</h4>
                <ul>
                    <li><label><input type="checkbox" name="cameras1" >Do 8.0 Mpix</label></li>
                    <li><label><input type="checkbox" name="cameras2" >Od 8.0 Mpix do 16.0 Mpix</label></li>
                    <li><label><input type="checkbox" name="cameras3" >Preko 16.0 Mpix</label></li>
                </ul>
            </div>
            <input class="sbt" type="submit" name="submit" value="Pronađi model" >
        </form>
    </section>
</div>
		



