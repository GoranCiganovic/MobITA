<section id="main">
        <div id="user">
            <h2>Izmenite podatke:  <?php echo  $user->first_name; ?> <?php echo  $user->last_name; ?> </h2>
            <div class="block">
			<div id="userupdatederror" class="error"><?php  echo $update;?></div>
			
			<form name="update" action="<?php URL ?>/user/update/" method="POST">
                <div class="message">
                    <div class="floatleft"><label for="userupdatefname">Ime: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdatefname" id="userupdatefname" placeholder="<?php echo  $user->first_name; ?>"/><span class="star" id="userupdatefnamestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdatelname">Prezime: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdatelname" id="userupdatelname" placeholder="<?php echo  $user->last_name; ?>"/><span class="star" id="userupdatelnamestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdateemail">E-mail adresa: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdateemail" id="userupdateemail" placeholder="<?php echo  $user->email; ?>"/><span class="star" id="userupdateemailstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdatepassword">Lozinka: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="password" name="userupdatepassword" id="userupdatepassword" placeholder="Lozinka" /><span class="star" id="userupdatepasswordstar"></span></div>
                    <div class="clear"></div>
                </div><br>
				<div class="message">
                    <div class="floatleft"><label for="userupdaterepeatpassword">Ponovite lozinku: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="password" name="userupdaterepeatpassword" id="userupdaterepeatpassword" placeholder="Ponovite lozinku" /><span class="star" id="userupdaterepeatpasswordstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdatephnumber">Broj telefona: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdatephnumber" id="userupdatephnumber" placeholder="<?php echo  $user->phone_number; ?>"/><span class="star" id="userupdatephnumberstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdateaddress">Adresa: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdateaddress" id="userupdateaddress" placeholder="<?php echo  $user->address; ?>"/><span class="star" id="userupdateaddressstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdatecity">Grad: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdatecity" id="userupdatecity" placeholder="<?php echo  $user->city; ?>"/><span class="star" id="userupdatecitystar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="userupdatepcode">Poštanski broj: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="userupdatepcode" id="userupdatepcode" placeholder="<?php echo  $user->postal_code; ?>"/><span class="star" id="userupdatepcodestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft">&nbsp;</div>
                    <div id="reg_right"><input type="submit" name="userupdatesubmit" id="userupdatesubmit" value="Potvrdite" class="reg_r" /><input type="hidden" name="token" value="<?php echo $update_token; ?>"></div>
                    <div class="clear"></div>
                </div>
            </form>

            </div>
        </div>
    </section>




