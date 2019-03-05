<section id="main"> 
		<div id="phones">
			<h2>Unesite slike za telefon</h2>
			<div class="block">
			<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
			<div id="error" class="error"><?php  echo $insertLogo; echo $insertfrontimg;  echo $insertbackimg;?></div>
					<div class="fesc">
						 <form class="fesc" name="logoform" action="<?php URL ?>/admin/insertImage/" method="POST" enctype="multipart/form-data">
							<div class="fesc">
								<div class="fimg">Izaberite proizvođača za logo :</div>
								<div class="fimg"><select class="selectadmin" name='brandsel'>
								<option disabled selected value>Proizvodač</option>
								<?php foreach($brands as $brand){ ?>
								<option value="<?php echo $brand->name; ?>"><?php echo $brand->name; ?></option><?php } ?></select></div>
								<div class="clear"></div>
							</div>
							<div class="fimg"><input type="file" name="logo" size="50" class="fimp"></div>
							<div class="fimgimp"><input type="submit" name="submit_logo" class="reg_rlimg" value="Unesite logo proizvođača"></div>
						</form>
						<div class="clear"></div>
						</div>
						
						<div class="fesc">
						 <form class="fesc" name="frontimg" action="<?php URL ?>/admin/insertImage/" method="POST" enctype="multipart/form-data">
							<div class="fesc">
								<div class="fimg">Izaberite model za prednju sliku:</div>
								<div class="fimg"><select class="selectadmin" name='modelselfront'>
								<option disabled selected value>Model</option>
								<?php foreach($allphones as $phone){ ?>
								<option value="<?php echo $phone->id; ?>"><?php echo $phone->name; ?></option><?php } ?></select></div>
								<div class="clear"></div>
							</div>
							<div class="fimg"><input type="file" name="front_img" size="50" class="fimp"></div>
							<div class="fimg"><input type="text" name="imgname" placeholder="Naziv slike"></div>
							<div class="fimg"><input type="text" name="imgdesc" placeholder="Opis slike"></div>
							<div class="fimgimp"><input type="submit" name="submit_front" class="reg_rlimg" value="Unesite prednju sliku"></div>
							<div class="clear"></div>
						</form>
						</div>
						
						<div class="fesc">
						 <form class="fesc" name="backimg" action="<?php URL ?>/admin/insertImage/" method="POST" enctype="multipart/form-data">
							<div class="fesc">
								<div class="fimg">Izaberite model za zadnju sliku:</div>
								<div class="fimg"><select class="selectadmin" name='modelselback'>
								<option disabled selected value>Model</option>
								<?php foreach($allphones as $phone){ ?>
								<option value="<?php echo $phone->id; ?>"><?php echo $phone->name; ?></option><?php } ?></select></div>
								<div class="clear"></div>
							</div>
							<div class="fimg"><input type="file" name="back_img" size="50" class="fimp"></div>
							<div class="fimg"><input type="text" name="imgname" placeholder="Naziv slike"></div>
							<div class="fimg"><input type="text" name="imgdesc" placeholder="Opis slike"></div>
							<div class="fimgimp"><input type="submit" name="submit_back" class="reg_rlimg" value="Unesite zadnju sliku"></div>
							<div class="clear"></div>
						</form>
						</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>
</div>