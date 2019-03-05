<section id="main">
    <div id="reg">
        <h2>Registracija novog korisnika</h2>
        <div class="block">
			<div id="error" class="error">Ukoliko ste registrovani, prijavite se <a class='reg_r' id='cmn' href='<?php URL ?>/login/index/'> Ovde</a></div>
			<div class="clear"></div>
            <h3>Unesite podatke:</h3>
            <div id="registererror" class="error"><?php echo $register; ?></div>
            <form name="register" action="<?php URL ?>/register/index/" method="POST">
                <div class="message">
                    <div class="floatleft"><label for="registerfname">Ime: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registerfname" id="registerfname" placeholder="Ime"/><span class="star" id="registerfnamestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registerlname">Prezime: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registerlname" id="registerlname" placeholder="Prezime"/><span class="star" id="registerlnamestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registeremail">E-mail adresa: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registeremail" id="registeremail" placeholder="E-mail adresa"/><span class="star" id="registeremailstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registerpassword">Lozinka: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="password" name="registerpassword" id="registerpassword" placeholder="Lozinka" /><span class="star" id="registerpasswordstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registerrepeatpassword">Ponovite lozinku: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="password" name="registerrepeatpassword" id="registerrepeatpassword" placeholder="Ponovite lozinku" /><span class="star" id="registerrepeatpasswordstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registerphonenumber">Broj telefona: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registerphonenumber" id="registerphonenumber" placeholder="Broj telefona"/><span class="star" id="registerphonenumberstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registeraddress">Adresa: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registeraddress" id="registeraddress" placeholder="Adresa"/><span class="star" id="registeraddressstar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registercity">Grad: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registercity" id="registercity" placeholder="Grad"/><span class="star" id="registercitystar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft"><label for="registerpostalcode">Poštanski broj: &nbsp;</label></div>
                    <div class="field"><input class="msginp" type="text" name="registerpostalcode" id="registerpostalcode" placeholder="Poštanski broj"/><span class="star" id="registerpostalcodestar"></span></div>
                    <div class="clear"></div>
                </div><br>
                <div class="message">
                    <div class="floatleft">&nbsp;</div>
                    <div id="reg_right"><input type="submit" name="registersubmit" id="registersubmit" value="Registrujte se" class="reg_r" /><input type="hidden" name="token" value="<?php echo $reg_token; ?>"></div>
                    <div class="clear"></div>
                </div>
            </form>

        </div>

    </div>
</section>

