            <section id="main">
                <div id="cart">
                    <h2>Korpa <?php echo $userInfo->first_name;?> <?php echo $userInfo->last_name; ?></h2>
                    <div class="block">
						<div id="error" class="error"><?php  ?></div>
						
						
						<div class="article">
						<p>Uneli ste u korpu telefon:</p>
						<table>
							<tr>
								<th>Telefon</th>
								<th>Cena</th>
								<th>Kom</th>
							</tr>
							<tr>
								<td><?php //var_dump($phoneCart);//echo $orderPhone->name; ?></td>
								<td><?php //echo $orderPhone->price; ?></td>
								<td id="commdif"><form action="<?php URL ?>/cart/index/<?php //echo $phone->id ; ?>" method="POST">
							</tr>
						</table>
						</div>
						
						<h3>Istorija kupovine:</h3>
						<?php foreach($userOrders as $order){ ?>
						<div class="userorder">
							<a class='reg_r' id='cmn' href='<?php URL ?>/cart/index/<?php	echo $order->order_id ?>'>Narudžbenica <?php	echo $order->order_date ?></a>
						
						</div>
						<?php }  ?>
						
                    </div> 
                </div>
            </section>
         </div>