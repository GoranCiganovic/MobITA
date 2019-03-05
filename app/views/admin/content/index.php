<section id="main">
    <div id="content">
	<?php foreach($comments as $comment){ ?>
        <h2>Komentar</h2>
        <div class="block">
			<p><a href="<?php URL ?>/admin/index/" id="cmn" class="reg_r"> Administracija</a></p>
			<form action="<?php URL ?>/admin/comments/" method="POST">
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/comments/" >Svi komentari</a>
				<input type="submit" name="on_hold" class="reg_r" value="Na cekanju" />
				<input type="submit" name="approved" class="reg_r" value="Odobreni" />
				<input type="submit" name="denial" class="reg_r" value="Odbijeni" />
			</form>
				<div class="comtxt"></div>	
				<div class="userdata">
				<div id="error" class="error"><?php echo $comment->status_name; ?></div>
					<div class="comname">Korisnik: </div><div class="comname"><?php echo $comment->first_name; ?> <?php echo $comment->last_name; ?> </div><div class="comdate">datum: <?php echo $comment->comment_date; ?></div>
					<div class="clear"></div>
					<div class="comname">Komentar na telefon: </div><div class="comname"><?php echo $comment->phone_name; ?> </div>
					<div class="clear"></div>
				</div>
				<div class="comtxt"><?php echo $comment->comment; }?></div>
				<div class="clear"></div>
				<div class="comtxt">	
					<form action="<?php URL ?>/admin/content/<?php echo $comment->comment_id; ?>" method="POST">
					<input type="submit" name="app" class="reg_r" value="Odobrite" />
					<input type="submit" name="den" class="reg_r" value="Odbijte" />
					</form>
				</div>
		</div>
	</div>	
</section>
</div>
