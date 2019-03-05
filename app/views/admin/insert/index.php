<section id="main"> 
		<div id="phones">
			<h2>Unesite nov telefon</h2>
			<div class="block">
				<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
				<div id="error" class="error"><?php  echo $insertPhones;?></div>
				<div id="down">
					 <form name="insertphone" action="<?php URL ?>/admin/insertPhone/" method="POST">
					 <div class="esc">
						<div class="desc">Model : </div>
						<div class="ldesc"><input type="text" name="model" placeholder="Naziv modela"> </div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Cena :</div>
						<div class="ldesc"><input type="number" min="0" max="9999" step="0.001" name="price" placeholder="Cena modela"> rsd</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Stanje :</div>
						<div class="ldesc"><input type="number" min="0" max="99999" name="stock" placeholder="Količina"> kom</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Dimenzije :</div>
						<div class="ldesc"><input type="text" name="dimensions" placeholder="npr. 100 x 40 x 12">  mm</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Masa :</div>
						<div class="ldesc"><input type="number" min="0" max="99999" name="weight" placeholder="Masa"> g</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Datum :</div>
						<div class="ldesc"><input type="date" name="date" placeholder="Datum"> </div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Proizvođač :</div>
						<div class="ldesc"><select class="selectadmin" name='brandsel'>
						<option disabled selected value>Proizvodač</option>
						<?php foreach($brands as $brand){ ?>
						<option value="<?php echo $brand->name; ?>"><?php echo $brand->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="text" name="brand" placeholder="Proizvođač"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Operativni sistem : </div>
						<div class="ldesc"><select class="selectadmin" name='systemsel'>
						<option disabled selected value>Operativni sistem</option>
						<?php foreach($systems as $system){ ?>
						<option value="<?php echo $system->name; ?>"><?php echo $system->name; ?></option><?php } ?></select> (izaberite iz liste) </div>
						<div class="vldesc"><input type="text" name="system" placeholder="Operativni sistem"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Boja : </div>
						<div class="ldesc"><select class="selectadmin" name="colorsel">
						<option disabled selected value>Boja</option>
						<?php foreach($colors as $color){ ?>
						<option value="<?php echo $color->name; ?>"><?php echo $color->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="text" name="color" placeholder="Boja"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Rezolucija ekrana: </div>
						<div class="ldesc"><select class="selectadmin" name="screen_resolutionsel">
						<option disabled selected value>Rezolucija ekrana</option>
						<?php foreach($screen_resolutions as $screen_resolution){ ?>
						<option value="<?php echo $screen_resolution->resolution; ?>"><?php echo $screen_resolution->resolution; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="text" name="screen_resolution" placeholder="Rezolucija ekrana"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Velicina ekrana : </div>
						<div class="ldesc"><select class="selectadmin" name="screen_sizesel">
						<option disabled selected value>Veličina ekrana</option>
						<?php foreach($screen_sizes as $screen_size){ ?>
						<option value="<?php echo $screen_size->size; ?>"><?php echo $screen_size->size; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="99" step="0.1" name="screen_size" placeholder="Velicina ekrana"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">RAM memorija : </div>
						<div class="ldesc"><select class="selectadmin" name="ramsel">
						<option disabled selected value>RAM memorija</option>
						<?php foreach($rams as $ram){ ?>
						<option value="<?php echo $ram->name; ?>"><?php echo $ram->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="999" step="0.1" name="ram" placeholder="Ram memorija"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Interna memorija : </div>
						<div class="ldesc"><select class="selectadmin" name="intsel">
						<option disabled selected value>Interna memorija</option>
						<?php foreach($ints as $int){ ?>
						<option value="<?php echo $int->name; ?>"><?php echo $int->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="9999" name="int" placeholder="Interna memorija"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Sim SLOT : </div>
						<div class="ldesc"><select class="selectadmin" name="simsel">
						<option disabled selected value>Sim SLOT</option>
						<?php foreach($sims as $sim){ ?>
						<option value="<?php echo $sim->name; ?>"><?php echo $sim->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="text" name="sim" placeholder="Sim SLOT"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Baterija : </div>
						<div class="ldesc"><select class="selectadmin" name="batterysel">
						<option disabled selected value>Baterija</option>
						<?php foreach($batteries as $battery){ ?>
						<option value="<?php echo $battery->name; ?>"><?php echo $battery->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="99999" name="battery" placeholder="Baterija"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Prednja kamera : </div>
						<div class="ldesc"><select class="selectadmin" name="front_camerasel">
						<option disabled selected value>Prednja kamera</option>
						<?php foreach($front_cameras as $front_camera){ ?>
						<option value="<?php echo $front_camera->name; ?>"><?php echo $front_camera->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="9999" step="0.1" name="front_cam" placeholder="Prednja kamera"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Zadnja kamera : </div>
						<div class="ldesc"><select class="selectadmin" name="back_camerasel">
						<option disabled selected value>Zadnja kamera</option>
						<?php foreach($back_cameras as $back_camera){ ?>
						<option  value="<?php echo $back_camera->name; ?>"><?php echo $back_camera->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="number" min="0" max="9999" step="0.1" name="back_cam" placeholder="Zadnja kamera"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Website proizvođača: </div>
						<div class="ldesc"><select class="selectadmin" name='linksel'>
						<option disabled selected value>Website</option>
						<?php foreach($brands as $brand){ ?>
						<option value="<?php echo $brand->website; ?>"><?php echo $brand->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="vldesc"><input type="text" name="link" placeholder="Website"> (ili unesite novog)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Status :</div>
						<div class="ldesc"><select class="selectadmin" name="phone_status">
						<option disabled selected value>Status</option>
						<?php foreach($phone_status as $status){ ?>
						<option value="<?php echo $status->id; ?>"><?php echo $status->name; ?></option><?php } ?></select> (izaberite iz liste)</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc"></div>
						<div class="ldesc"><input type="hidden" name="token" value="<?php echo $insert_phonetoken; ?>"></div></div>
						<div class="ldesc"><input type="submit" name="submit" class="reg_rl" value="Unesite"></div></div>
						<div class="clear"></div>
					</div>	
					</form>
				</div>
			</div>
		</div> 
    </section>
</div>