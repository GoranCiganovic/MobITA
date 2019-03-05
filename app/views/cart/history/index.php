<section id="main">
    <div id="carthistory">
    <h2>Korpa  <?php if($userInfo){ ?>- <?php echo $userInfo->first_name; ?> <?php echo $userInfo->last_name;} ?></h2>
		<div class="block">
			<div id="error" class="error"><?php if (!$userOrders) { ?> Nemate narudžbenica. <?php } ?></div>
			<div class="article"><?php if($orderHistory){foreach($orderHistory as $key=>$value){ ?>
			<h4>Telefon: <?php echo $value->phone_name; ?> </h4>
				<div class="singlecart">
					<div class="phnam"><img src="<?php URL ?><?php echo $value->img_path; ?>" alt="<?php echo $value->img_desc ?>"/></div>
					<div class="prnam">Datum: <?php echo $value->order_date; ?> </div>
					<div class="prnam">Cena: <?php echo $value->order_price= number_format($value->order_price, 3); ?> rsd/kom</div>
					<div class="prnam">Količina <?php echo $value->order_quantity; ?> kom</div>
					<div class="prnam">Ukupno: <?php echo $value->order_total= number_format($value->order_total, 3); ?> rsd</div>
			</div><?php } }?>
				<div class="clear"></div>		
			</div>
			<?php if ($userOrders) { ?>				
			<h3>Prethodne narudžbine:</h3> <?php foreach ($userOrders as $order) { ?>
			<div class="userorder">
				<a class='reg_r' id='cmn' href='<?php URL ?>/cart/history/<?php echo $order->order_id ?>'>Narudžbenica <?php echo $order->order_date ?></a>
			</div><?php }} ?>
		</div>
	</div>
</section>
</div>

