<section id="main">
    <div id="superadmin_errors">
        <h2>Greške</h2>
        <div class="block">
		<p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
		<?php if($errors){ ?>
			<table>
				<tr>
					<th>ID</th>
					<th>Poruka</th>
					<th>Datum</th>
					<th>Sadržaj</th>
				</tr>
				<tr><?php foreach($errors as $err){ ?>
					<td><?php echo $err->id; ?></td>
					<td><?php echo $err->message; ?></td>
					<td><?php echo $err->date; ?></td>
					<td id="errcont"><form action="<?php URL ?>/superadmin/errors/<?php echo $err->id; ?>" method="POST">
					<input type="submit" name="errorcontent" id="cmn" class="reg_r" value="Sadržaj" /></form></td>
				</tr><?php } } ?>
			</table>
		
			<div class="errcontent">
			<?php foreach($errcontent as $error){?>
			<div class="errdataname"id="errID">ID greške: </div><div class="errdata"><?php echo $error->id; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errmsg">Tekstualni opis greške: </div><div class="errdata" ><?php echo $error->message; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errdate">Datum greške: </div><div class="errdata"><?php echo $error->date; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errcode">Kod greške: </div><div class="errdata"><?php echo $error->code; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errfile">Naziv dokumenta: </div><div class="errdata"><?php echo $error->file; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errline">Linija koda greške: </div><div class="errdata"><?php echo $error->line; ?></div>
			<div class="clear"></div>
			<div class="errdataname"id="errtraceas">Tekstualna putanja: </div><div class="errdata"><?php echo $error->trace_as_string; ?></div>
			<div class="clear"></div>
			<?php } ?>
			</div>
			<?php if($errcontent){ ?> 
			<form action="<?php URL ?>/superadmin/errors/<?php echo $err->id; ?>" method="POST">
				<input type="submit" name="errordelete" id="cmn" class="reg_r" value="Obriši" />
			</form>
			<?php } ?>
		</div>
	</div>	
</section>
</div>