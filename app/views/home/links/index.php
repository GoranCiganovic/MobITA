<section id="main">
            	<div id="links">
                    <h2>Web stranice proizvođača </h2>
                    <div class="block">
						<?php foreach($brands as $web) { ?>
                        <div id="link">
                            <div class="lleft"><a href="<?php echo $web->website; ?>" target='_blank'><img class="imglogo" src="<?php echo $web->logo; ?>" alt="logo"/></a></div>
                            <div class="ldown"><a href="<?php echo $web->website; ?>" target='_blank'><?php echo $web->name; ?></a></div>
						</div>
						
						<?php } ?>
                    </div> 
					<div class="clear"></div>
                </div>
            </section>
