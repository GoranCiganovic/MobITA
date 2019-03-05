<section id="main">
    <div id="profile">
        <h2>Profil korisnika</h2>
        <div class="block">
		<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
			<form action="<?php URL ?>/admin/users/" method="POST">
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/users/" >Svi korisnici</a>
			<input type="submit" name="active" class="reg_r" value="Aktivni" />
			<input type="submit" name="non_active" class="reg_r" value="Neaktvini" />
			<input type="submit" name="banned" class="reg_r" value="Zabranjeni" />
		</form>
		<?php foreach($users as $data){?>
				<div class="userdata">
				<div id="error" class="error2"><?php  echo $data->status;?></div>
					<div class="dataname" id="us_id">Redni broj: </div><div class="data"><?php echo $data->id; ?>.</div>
					<div class="clear"></div>
					<div class="dataname" id="fname">Ime:</div><div class="data"><?php echo $data->first_name; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="lname">Prezime: </div><div class="data"><?php echo $data->last_name; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="email">Email adresa: </div><div class="data"><?php echo $data->email; ?></div>
					<div class="clear"></div>
					<div class="dataname"id="phone">Telefon: </div><div class="data"><?php echo $data->phone_number; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="regdate">Datum registracije: </div><div class="data"><?php echo $data->registration_date; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="ip">Registrovan sa IP: </div><div class="data"><?php echo $data->ip; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="address">Adresa: </div><div class="data"><?php echo $data->address; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="city">Grad: </div><div class="data"><?php echo $data->city; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="postcode">Poštanski broj: </div><div class="data"><?php echo $data->postal_code; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="llt">Poslednje logovanje: </div><div class="data"><?php echo $data->last_logged_time; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="llip">IP adresa poslednjeg logovanja: </div><div class="data"><?php echo $data->last_logged_ip; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="status">Status: </div><div class="data"><?php echo $data->status; ?></div>
					<div class="clear"></div>
				<div class="comtxt">	
					<form action="<?php URL ?>/admin/profile/<?php  echo $data->id; ?>" method="POST">
					<input type="submit" name="act" class="reg_r" value="Aktiviraj profil" />
					<input type="submit" name="bann" class="reg_r" value="Zabrani profil" />
					</form>
				</div>
			<?php } ?>
		</div>
	</div>	
</section>
</div>
