        <div id="searchphone">
            <h2>Rezultat pretrage telefona preko search-a</h2>
            <div class="block">
				<?php if($search){foreach ($search as $phone) { ?>
                <div class="phone">
				<div class="sng"><?php echo $phone->phone_name; ?> </div>
                    <a href="<?php URL ?>/home/single/<?php echo $phone->phone_id; ?>"><img src="<?php URL ?><?php echo $phone->img_path;?>" alt="<?php echo $phone->img_desc ?>"/></a>
					<div class="sng"><?php echo $phone->phone_price; ?> rsd
						<form action="<?php URL ?>/cart/index/<?php echo $phone->phone_id; ?>" method='POST'>
							<?php if($add=='ADMINISTRACIJA'){ ?> <div class="admincart"> <?php }else{ ?><div class="cart"> <?php }?>
								<input type="submit" name='cartsubmit' id="cartsubmit" class="cartsubmit" value="<?php echo $add; ?>" />
							</div>
						</form>
					</div>
                </div><?php  } }?>
            </div>
        </div>
</div> 
