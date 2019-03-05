<section id="main">
    <div id="users">
        <h2>Korisnici</h2>
		<div class="block">
		<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
			<form action="<?php URL ?>/admin/users/" method="POST">
			<a id="cmn" class="reg_r" href="<?php URL ?>/admin/users/" >Svi korisnici</a>
			<input type="submit" name="active" class="reg_r" value="Aktivni" />
			<input type="submit" name="non_active" class="reg_r" value="Neaktvini" />
			<input type="submit" name="banned" class="reg_r" value="Zabranjeni" />
		</form>
		<?php if($users) { ?>
		<table>
			<tr>
				<th>Red br</th>
				<th>Ime i prezime</th>
				<th>Email</th>
				<th>Status</th>
				<th>Profil</th>
			</tr>
			<tr><?php foreach($users as $data){?>
					<td><?php echo $data->id; ?>.</td>
					<td><?php echo $data->first_name; ?> <?php echo $data->last_name; ?></td>
					<td><?php echo $data->email; ?></td>
					<td><?php echo $data->status; ?></td>
					<td id="commdif"><form action="<?php URL ?>/admin/profile/<?php echo $data->id ; ?>" method="POST">
					<input type="submit" name="profile" class="reg_r" value="Pogledaj" /></form></td>
			</tr><?php }  ?>
		</table>
		<?php } ?>
		</div>
	</div>
</section>
</div>