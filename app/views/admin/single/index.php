<section id="main"> 
		<div id="phones"><?php  foreach($single as $phone){ ?>
			<h2>Izmenite <?php echo $phone->phone_name; ?></h2>
			<div class="block">
			<div class="cartsgl"> 
					<form action="<?php URL ?>/admin/index/" method='POST'>
						<?php if($add=='ADMINISTRACIJA'){ ?> <div class="admincart"> <?php }else{ ?><div class="cart"> <?php }?>
							<input type="submit" name="cartsubmit" class="reg_r" value="<?php echo $add; ?>" />
						</div>
					</form>
				</div>
				<div class="clear"></div>
				<div class="phonesadmin">
					<img class="adminimg" src="<?php URL ?><?php echo $phone->img_path; ?>" alt="<?php echo $phone->img_desc; ?>"/>
					<img  class="adminimg" src="<?php URL ?><?php foreach($backImage as $image){echo $image->img_path; ?>" alt="<?php echo $image->img_desc;} ?>"/>
					<img class="adminimg" src="<?php URL ?><?php echo $phone->brand_logo; ?>" alt="<?php echo $phone->brand_logo; ?>"/>
					<div class="clear"></div>
				</div>
				<div class="top">
				
						<div class="fesc">
						 <form class="fesc" name="frontimg" action="<?php URL ?>/admin/phones/" method="POST" enctype="multipart/form-data">
							<div class="fimg"><input type="file" name="front_img" size="50" class="fimp"></div>
							<div class="fimg"><input type="text" name="imgname" placeholder="Naziv slike"></div>
							<div class="fimg"><input type="text" name="imgdesc" placeholder="Opis slike"></div>
							<div class="fimgimp"><input type="submit" name="submit_front" class="reg_rlimg" value="Izmenite prednju sliku"></div>
							<div class="clear"></div>
						</form>
						</div>
						<div class="fesc">
						 <form class="fesc" name="backimg" action="<?php URL ?>/admin/phones/" method="POST" enctype="multipart/form-data">
							<div class="fimg"><input type="file" name="back_img" size="50" class="fimp"></div>
							<div class="fimg"><input type="text" name="imgname" placeholder="Naziv slike"></div>
							<div class="fimg"><input type="text" name="imgdesc" placeholder="Opis slike"></div>
							<div class="fimgimp"><input type="submit" name="submit_back" class="reg_rlimg" value="Izmenite zadnju sliku"></div>
							<div class="clear"></div>
						</form>
						</div>
						<div class="fesc">
						 <form class="fesc" name="logo" action="<?php URL ?>/admin/phones/" method="POST" enctype="multipart/form-data">
							<div class="fimg"><input type="file" name="logo" size="50" class="fimp"></div>
							<div class="fimgimp"><input type="submit" name="submit_logo" class="reg_rlimg" value="Izmenite logo proizvođača"></div>
						</div>
						<div class="clear"></div>
						</form>
					
				</div>
				 <div id="error" class="error"><?php  echo $editimg; ?></div>
				<div id="down">
					 <form name="edit" action="<?php URL ?>/admin/phones/" method="POST">
					 <div class="esc">
						<div class="desc">Model : </div>
						<div class="rdesc"><?php echo $phone->phone_name; ?></div>
						<div class="ldesc"><input type="text" name="model" placeholder="Model"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Cena :</div>
						<div class="rdesc"><?php echo $phone->phone_price; ?> rsd </div> 
						<div class="ldesc"><input type="number" min="0" max="9999" step="0.001" name="price" placeholder="Cena"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Stanje :</div>
						<div class="rdesc"><?php echo $phone->phone_stock; ?> kom</div> 
						<div class="ldesc"><input type="number" min="0" max="99999" name="stock" placeholder="Stanje"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Proizvodač :</div>
						<div class="rdesc"><?php echo $phone->brand_name; ?></div>
						<div class="ldesc"><select class="selectadmin" name='brand'>
						<option disabled selected value>Proizvodač</option>
						<?php foreach($brands as $brand){ ?>
						<option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Operativni sistem : </div>
						<div class="rdesc"><?php echo $phone->system_name; ?></div>
						<div class="ldesc"><select class="selectadmin" name='system'>
						<option disabled selected value>Operativni sistem</option>
						<?php foreach($systems as $system){ ?>
						<option value="<?php echo $system->id; ?>"><?php echo $system->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Boja : </div>
						<div class="rdesc"><?php echo $phone->color_name; ?></div>
						<div class="ldesc"><select class="selectadmin" name="color">
						<option disabled selected value>Boja</option>
						<?php foreach($colors as $color){ ?>
						<option value="<?php echo $color->id; ?>"><?php echo $color->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Rezolucija ekrana: </div>
						<div class="rdesc"><?php echo $phone->scr_res; ?></div>
						<div class="ldesc"><select class="selectadmin" name="screen_resolution">
						<option disabled selected value>Rezolucija ekrana</option>
						<?php foreach($screen_resolutions as $screen_resolution){ ?>
						<option value="<?php echo $screen_resolution->id; ?>"><?php echo $screen_resolution->resolution; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Veličina ekrana : </div>
						<div class="rdesc"><?php echo $phone->scr_size; ?>"</div>
						<div class="ldesc"><select class="selectadmin" name="screen_size">
						<option disabled selected value>Veličina ekrana</option>
						<?php foreach($screen_sizes as $screen_size){ ?>
						<option value="<?php echo $screen_size->id; ?>"><?php echo $screen_size->size; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">RAM memorija : </div>
						<div class="rdesc"><?php echo $phone->ram_name; ?> GB</div>
						<div class="ldesc"><select class="selectadmin" name="ram">
						<option disabled selected value>RAM memorija</option>
						<?php foreach($rams as $ram){ ?>
						<option value="<?php echo $ram->id; ?>"><?php echo $ram->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Interna memorija : </div>
						<div class="rdesc"><?php echo $phone->int_name; ?> GB</div>
						<div class="ldesc"><select class="selectadmin" name="int">
						<option disabled selected value>Interna memorija</option>
						<?php foreach($ints as $int){ ?>
						<option value="<?php echo $int->id; ?>"><?php echo $int->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Sim SLOT : </div>
						<div class="rdesc"><?php echo $phone->sim_name ; ?></div>
						<div class="ldesc"><select class="selectadmin" name="sim">
						<option disabled selected value>Sim SLOT</option>
						<?php foreach($sims as $sim){ ?>
						<option value="<?php echo $sim->id; ?>"><?php echo $sim->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Baterija : </div>
						<div class="rdesc"><?php echo $phone->batt_name; ?> mAx</div>
						<div class="ldesc"><select class="selectadmin" name="battery">
						<option disabled selected value>Baterija</option>
						<?php foreach($batteries as $battery){ ?>
						<option value="<?php echo $battery->id; ?>"><?php echo $battery->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Prednja kamera : </div>
						<div class="rdesc"><?php echo $phone->fcam_name; ?> Mpix</div>
						<div class="ldesc"><select class="selectadmin" name="front_camera">
						<option disabled selected value>Prednja kamera</option>
						<?php foreach($front_cameras as $front_camera){ ?>
						<option value="<?php echo $front_camera->id; ?>"><?php echo $front_camera->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Zadnja kamera : </div>
						<div class="rdesc"><?php echo $phone->bcam_name; ?> Mpix</div>
						<div class="ldesc"><select class="selectadmin" name="back_camera">
						<option disabled selected value>Zadnja kamera</option>
						<?php foreach($back_cameras as $back_camera){ ?>
						<option  value="<?php echo $back_camera->id; ?>"><?php echo $back_camera->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Dimenzije :</div>
						<div class="rdesc"><?php echo $phone->phone_dim; ?> mm</div>
						<div class="ldesc"><input type="text" name="dimensions" placeholder="Dimenzije"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Masa :</div>
						<div class="rdesc"><?php echo $phone->phone_weight; ?> g</div>
						<div class="ldesc"><input type="number" min="0" max="99999" name="weight" placeholder="Masa"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Datum :</div>
						<div class="rdesc"><?php echo $phone->phone_date; ?> </div>
						<div class="ldesc"><input type="date" name="date" placeholder="Datum"></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Link proizvođača : </div>
						<div class="rdesc"><a href="<?php echo $phone->br_website; ?>" target="_blank"><?php echo $phone->brand_name; ?></a></div>
						<div class="ldesc"><input type="text" name="link" placeholder="Link proizvođača">
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Status :</div>
						<div class="rdesc"><?php echo $phone->phone_status_name; ?> </div>
						<div class="ldesc"><select class="selectadmin" name="phone_status">
						<option disabled selected value>Status</option>
						<?php foreach($phone_status as $status){ ?>
						<option value="<?php echo $status->id; ?>"><?php echo $status->name; ?></option><?php } ?></select></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc"></div>
						<div class="rdesc"><input type="hidden" name="token" value="<?php echo $edit_token; ?>"></div></div>
						<div class="ldesc"><input type="submit" name="submit" class="reg_rl" value="Unesite"></div></div>
						<div class="clear"></div>
					</div>	
					</form>
				<?php } ?>
				</div>
			</div>
		</div> 
    </section>
</div>