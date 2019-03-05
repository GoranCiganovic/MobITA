<section id="main">
    <div id="cart">
    <h2>Korpa  <?php if($userInfo){ ?>- <?php echo $userInfo->first_name; ?> <?php echo $userInfo->last_name;} ?><span class="cartimg"></span><span class="clear"></span></h2>
	
    <div class="block">
        <div id="error" class="error"><?php if (!$phoneCart) { ?> Vaša korpa je prazna. <?php } ?></div>
        <div class="article"><?php if($phoneCart) { foreach ($phoneCart as $cart => $value) { ?>	
        
            <div class="singlecart">
                <div class="phnam"><img src="<?php URL ?><?php echo $value->img_path; ?>" alt="<?php echo $value->img_desc ?>"/></div>
                <div class="remnam" >
                    <form action="<?php URL ?>/cart/index/" method="POST">
						<input type="hidden" name="phoneID" value="<?php echo $value->id; ?>" />
                        <input type="hidden" name="hiddenID" value="<?php echo $cart; ?>" />
                        <input class="reg_r" id='cmn' type="submit" name="submitremove" value="Izbaci" />
                    </form>
					
                </div>
				
                <div class="prnam"><?php echo $value->name; ?></div>
				
                <div class="prnam">Cena: <?php echo $value->price; ?> rsd/kom</div>

                <form action="<?php URL ?>/cart/index/<?php echo $value->id; ?>" method="POST">
                <div  class="prnam">Količina: 
                    <input  class="cartinput" type="number" min="1" max="<?php echo $value->stock; ?>" name="<?php echo $value->id; ?>" value="<?php echo $value->quantity; ?>"> 
                    <input type="hidden" name="hiddID" value="<?php echo $cart; ?>" />
                    <input class="reg_r" id='cmn' type="submit" name="submitstock" value="Kom" />
                </div>
				</form>
				<div class="prnamtotal">Ukupno: <?php echo $value->sumary = number_format($value->sumary, 3); ?> rsd</div>
				
				
				
            </div>

            <div class="clear"></div><?php } ?>	
			<?php if($userInfo){ ?>
			<form action='<?php URL ?>/cart/order/' method='POST'>
			<div class="cash">
				<p>Proizvod koji ste odabrali će Vam biti isporučen na kućnu adresu.</p>
				<p>Plaćanje se vrši u gotovini, kurirskoj službi prilikom isporuke.</p>
				<p><a  href='<?php URL ?>/cart/accept/'> Prihvatam uslove korišćenja.</a><input type="checkbox" name="accept" value="prihvatam"></p>
			</div>
			<div class="clear"></div>
			<?php } ?>
			
   			<div  id="sumary">UKUPNO: <?php if ($sum) { echo $sum;} ?> rsd  
			<?php if($userInfo){ ?>
				<input class="reg_r" id='cmn' type="submit" name="submitorder" value="Naruči" />
			<?php }else{ ?>
				<a class='reg_r' id='cmn' href='<?php URL ?>/cart/order/'> Naruči</a>
			<?php } ?>
			</div>
				<div class="clear">
			</div>
			<div class="singlecart"><div id="error" class="error"><?php echo $cartOrder; ?></div></div>
			<div class="clear"></div>
			</form>
        </div>
			
<?php } ?>
        <?php if ($userOrders) { ?>				
        <h3>Prethodna naručivanja:</h3> <?php foreach ($userOrders as $order) { ?>
        <div class="userorder">
			<a class='reg_r' id='cmn' href='<?php URL ?>/cart/history/<?php echo $order->order_id ?>'>Narudžbenica <?php echo $order->order_date ?></a>
        </div><?php }} ?>	
    </div> 
</div>
</div>
</section>

