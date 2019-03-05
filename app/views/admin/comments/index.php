<section id="main">
    <div id="admin_comments">
        <h2>Komentari</h2>
        <div class="block">
		<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
		<form action="<?php URL ?>/admin/comments/" method="POST">
		<a id="cmn" class="reg_r" href="<?php URL ?>/admin/comments/" >Svi komentari</a>
			<input type="submit" name="on_hold" class="reg_r" value="Na čekanju" />
			<input type="submit" name="approved" class="reg_r" value="Odobreni" />
			<input type="submit" name="denial" class="reg_r" value="Odbijeni" />
		</form>
			<table>
				<tr>
					<th>Redni broj</th>
					<th>Datum</th>
					<th>Korisnik</th>
					<th>Telefon</th>
					<th>Status</th>
					<th>Komentar</th>
				</tr>
				<tr><?php foreach($comments as $comment){ ?>
					<td><?php echo $comment->comment_id; ?></td>
					<td><?php echo $comment->comment_date; ?></td>
					<td><?php echo $comment->first_name; ?> <?php echo $comment->last_name; ?></td>
					<td><?php echo $comment->phone_name; ?></td>
					<td><?php echo $comment->status_name; ?></td>
					<td id="commdif"><form action="<?php URL ?>/admin/content/<?php echo $comment->comment_id ; ?>" method="POST">
					<input type="submit" name="content" class="reg_r" value="Sadržaj" /></form></td>
				</tr><?php }  ?>
			</table>
		</div>
	</div>	
</section>
</div>



