<section id="main">
    <div id="admin_info">
        <h2> <?php echo $user->first_name; ?> <?php echo $user->last_name; ?> - administrator</h2>
        <div class="block">
		 <p><a href="<?php URL ?>/admin/index/" class="reg_r" id="cmn"> Administracija</a></p>
		  <div class="comment"><a href="<?php URL ?>/user/update/" class="reg_r" id="cmn"> Vaš profil </a></div>
            <h5><div>Registrovali ste se: <?php echo $user->registration_date; ?></div></h5>
            <div class="person">Ime: <?php echo $user->first_name; ?></div>
            <div class="person">Prezime: <?php echo $user->last_name; ?></div>
            <div class="person">Email adresa: <?php echo $user->email; ?></div>
            <div class="person">Telefon: <?php echo $user->phone_number; ?></div>
            <div class="person">Adresa: <?php echo $user->address; ?></div>
            <div class="person">Grad: <?php echo $user->city; ?></div>
            <div class="person">Poštanski broj:<?php echo $user->postal_code; ?></div>
           
        </div>
    </div>
</section>
</div>



