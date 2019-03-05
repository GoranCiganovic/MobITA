<section id="main"> 
		<div id="phones"><?php foreach($single as $phone){ ?>
			<h2><?php echo $phone->phone_name; ?></h2>
			<div class="block">
				<div class="phones">
					<img src="<?php URL ?><?php echo $phone->img_path; ?>" alt="<?php echo $phone->img_desc; ?>"/>
					<img src="<?php URL ?><?php foreach($backImage as $image){echo $image->img_path; ?>" alt="<?php echo $image->img_desc;} ?>"/>
				</div>
				<div class="cartsgl"> 
					<form action="<?php URL ?>/home/single/<?php echo $phone->phone_id; ?>/<?php echo $phone->phone_id; ?>" method='POST'>
						<div class="cart">
							<input type="submit" name='cartsubmit' id="cartsubmit" class="cartsubmit" value="<?php echo $add; ?>" />
						</div>
					</form>
				</div>
				<div class="clear"></div>
					<div class="esc">
						<div class="desc">Cena :</div>
						<div class="rdesc"><?php echo $phone->phone_price; ?> rsd</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Proizvođač :</div>
						<div class="rdesc"><?php echo $phone->brand_name; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Model : </div>
						<div class="rdesc"><?php echo $phone->phone_name; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Operativni sistem : </div>
						<div class="rdesc"><?php echo $phone->system_name; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Boja : </div>
						<div class="rdesc"><?php echo $phone->color_name; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Rezolucija ekrana: </div>
						<div class="rdesc"><?php echo $phone->scr_res; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Veličina ekrana : </div>
						<div class="rdesc"><?php echo $phone->scr_size; ?>"</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">RAM memorija : </div>
						<div class="rdesc"><?php echo $phone->ram_name; ?> GB</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Interna memorija : </div>
						<div class="rdesc"><?php echo $phone->int_name; ?> GB</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Sim SLOT : </div>
						<div class="rdesc"><?php echo $phone->sim_name ; ?></div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Baterija : </div>
						<div class="rdesc"><?php echo $phone->batt_name; ?> mAx</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Prednja kamera : </div>
						<div class="rdesc"><?php echo $phone->fcam_name; ?> Mpix</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Zadnja kamera : </div>
						<div class="rdesc"><?php echo $phone->bcam_name; ?> Mpix</div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Dimenzije :</div>
						<div class="rdesc"><?php echo $phone->phone_dim; ?> </div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Masa :</div>
						<div class="rdesc"><?php echo $phone->phone_weight; ?> </div>
						<div class="clear"></div>
					</div>
					<div class="esc">
						<div class="desc">Link proizvođača : </div>
						<div class="rdesc"><a href="<?php echo $phone->br_website; ?>" target="_blank"><?php echo $phone->brand_name; ?></a></div>
						<div class="clear"></div>
					</div>
				<?php } ?>
				
				<div class="cartsgl">
					<form action="<?php URL ?>/home/single/<?php echo $phone->phone_id; ?>/<?php echo $phone->phone_id; ?>" method='POST'>
						<div class="cart">
							<input type="submit" name="cartsubmit" class="reg_r" value="<?php echo $add; ?>" />
						</div>
					</form>
				</div>
				<div class="clear"></div>
				<div class="comment">
					<div id="headcom">Komentari</div>
					<div class="sglcom"><?php  foreach($comments as $comment){ ?>
						<div class="comname">Korisnik: <?php echo $comment->username; ?></div><div class="comdate"><?php echo $comment->date; ?></div>
						<div class="clear"></div>
						<div class="comtxt"><?php echo $comment->comment; ?></div>
						<?php } ?>
					</div>
					<div id="message">
                       <div id="error" class="error"><?php if($privilege!=3) { ?> Morate biti prijavljeni da biste ostavili komentar!<br><br>  <a class='reg_r' id='cmn' href='<?php URL ?>/login/index/'>Prijavite se</a><?php }?><?php  echo $insertcomment;?></div>
					   <div id="commenterror" class="error"></div>
                        <form id="cmnt" name="comment" action="<?php URL ?>/home/single/<?php foreach($single as $phone){ echo $phone->phone_id;}?>" method="POST">
                            <div class="message">
                                <div class="floatleft">Unesite komentar: &nbsp;</div>
                                <div class="field"><textarea name="phonecomment" id="phonecomment" placeholder="Unesite komentar"></textarea></div>
                                <div class="clear"></div>
							</div><br>
                            <div class="message">
                            	<div class="floatleft">&nbsp;</div>
                                <input type="submit" name="commentsubmit" id="commentsubmit" class="reg_r" value="Pošaljite" />
                                <input type="reset" name="commentreset" id="commentreset" class="reg_r" value="Poništite" />
                                <div class="clear"></div>
							</div>
                        </form>
					</div>
					<div id="restrict">MobITA zadržava pravo brisanja neprimerenih komentara sa sledećom sadržinom:<br>psovanje, vređanje, VELIKA SLOVA, lične poruke, reklamiranje i sl.</div>
				</div>
			</div>
		</div> 
    </section>
