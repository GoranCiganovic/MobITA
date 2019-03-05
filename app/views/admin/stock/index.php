<section id="main">
    <div id="phone_stock">
        <h2>Stanje - Status</h2>
        <div class="block">
		<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
		<form action="<?php URL ?>/admin/insertStock/" method="POST">
			<input type="submit" name="current" class="reg_rl" value="Aktuelni" />
			<input type="submit" name="outdated" class="reg_rl" value="Zastareli" />
			<input type="submit" name="yostock" class="reg_rl" value="Aktuelni - na stanju" />
			<input type="submit" name="nostock" class="reg_rl" value="Aktuelni - nema na stanju" />
		</form>
			<table><?php if($stock){ ?>
				<tr>
					<th>ID</th>
					<th>Model</th>
					<th>Cena (rsd)</th>
					<th>Status</th>
					<th>Stanje (kom)</th>
					<th>Izmeni</th>
				</tr>
				<tr><?php foreach($stock as $phone){ ?>
					<form action="<?php URL ?>/admin/insertStock/<?php echo $phone->phone_id; ?>" method="POST">
					<td><?php echo $phone->phone_id; ?></td>
					<td><?php echo $phone->phone_name; ?></td>
					<td><?php echo $phone->phone_price; ?> </td>
					<td>
						<select class="reg_r" name='phone_status'>
						<option disabled selected value><?php echo $phone->status_name; ?></option>
						<?php foreach($statusID as $status){ ?>
						<option value="<?php echo $status->id; ?>"><?php echo $status->name; ?></option><?php }?>
						</select>
					</td>
					<td><input class="reg_r" type="number" min="0" max="99999" name="stock" placeholder="<?php echo $phone->phone_stock; ?>"></td>
					<td><input class="reg_r" type="submit" name="addstock"  value="Izmeni" /></td>
					</form>
				</tr><?php } } ?>
			</table>
		</div>
	</div>	
</section>
</div>

