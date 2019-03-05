<section id="main">
    <div id="orders">
        <h2>Narudžbine</h2>
		<div class="block">
			<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p><br>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/" >Sve narudžbine</a>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/1" >Razmatra se</a>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/2" >Odbijene</a>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/3" >Prihvaćene</a>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/4" >Poslate</a>
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/5" >Isporučene</a>
			
			<?php if($singleOrder){ foreach($singleOrder as $single) { ?>
			<div class="userdata">
				<div id="error" class="error2"><?php  echo $single->order_status_name;?></div>
					<div class="dataname" id="or_id">ID: </div><div class="data"><?php echo $single->order_id; ?></div>
					<div class="clear"></div>
					<div class="dataname"id="telephone">Telefon: </div><div class="data"><a href="<?php URL ?>/home/single/<?php echo $single->phone_id; ?>"  ><?php echo $single->phone_name; ?></a></div>
					<div class="clear"></div>
					<div class="dataname"id="quantity">Kolilčina: </div><div class="data"><?php echo $single->order_quantity; ?> kom</div>
					<div class="clear"></div>
					<div class="dataname"id="phoneprice">Cena: </div><div class="data"><?php echo $single->order_price = number_format($single->order_price, 3); ?> rsd</div>
					<div class="clear"></div>
					<div class="dataname"id="total">Ukupno: </div><div class="data"><?php echo $single->order_total = number_format($single->order_total, 3); ?> rsd</div>
					<div class="clear"></div>
					<div class="dataname" id="orderdate">Datum narudžbenice: </div><div class="data"><?php echo $single->order_date; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="orip">Naručeno sa IP: </div><div class="data"><?php echo $single->order_ip; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="flname">Ime i prezime</div><div class="data"><a href="<?php URL ?>/admin/users/"  ><?php echo $single->user_first_name; ?> <?php echo $single->user_last_name; ?></a></div>
					<div class="clear"></div>
					<div class="dataname" id="email">Email adresa: </div><div class="data"><?php echo $single->user_email; ?></div>
					<div class="clear"></div>
					<div class="dataname"id="phone">Telefon: </div><div class="data"><?php echo $single->user_phone_number; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="address">Adresa: </div><div class="data"><?php echo $single->user_address; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="city">Grad: </div><div class="data"><?php echo $single->user_city; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="postcode">Poštanski broj: </div><div class="data"><?php echo $single->user_postal_code; ?></div>
					<div class="clear"></div>
					<div class="dataname" id="userstatus">Status korisnika: </div><div class="data"><?php echo $single->user_status_name; ?></div>
					<div class="clear"></div>
					<br><br>
				
					<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/1/<?php echo $single->order_id; ?>" >Razmatra se</a>
					<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/2/<?php echo $single->order_id; ?>" >Odbija se</a>
					<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/3/<?php echo $single->order_id; ?>" >Prihvata se</a>
					<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/4/<?php echo $single->order_id; ?>" >Poslato</a>
					<a id="cmn" class="reg_r" href="<?php URL ?>/admin/orders/5/<?php echo $single->order_id; ?>" >Isporučeno</a>
				
			</div>
			<?php }} ?>
			
			<div class="ord"><?php  if($orders && !$singleOrder){ ?>
				<table>
					<tr>
						<th>ID</th>
						<th>Datum</th>
						<th>Status</th>
					</tr>
					<?php  foreach($orders as $order){ ?>
					<tr>
							<td><?php echo $order->order_id; ?></td>
							<td><?php echo $order->order_date; ?></td>
							<td id="commdif">
								<form action="<?php URL ?>/admin/orders/" method="POST">
								<input type="hidden" name="orderID" value="<?php echo $order->order_id; ?>">
								<input id='numb' type="submit" name="order" class="reg_r" value="<?php echo $order->order_status_name; ?>" />
								</form>
							</td>
					</tr>
					<?php } } ?>
				</table>
			</div>
		</div>
	</div>
</section>
</div>