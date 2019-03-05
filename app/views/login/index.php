            <section id="main">
            	<div id="log">
                	 <h2>Prijavite se na svoj nalog</h2>
                     <div class="block">
                        <h4>Za prijavu upišite e-mail adresu i lozinku</h4>
                            <div id="loginerror" class="error"><?php  echo $login; ?></div>
                            <form name="login" action="<?php URL ?>/user/index/" method="POST">
                                <div class="message">
                                    <div class="floatleft"><label for="logemail">E-mail adresa: &nbsp;</label></div>
                                    <div class="field"><input class="msginp" type="text" name="logemail" id="logemail" placeholder="E-mail adresa"/><span class="star" id="logemailstar"></span></div>
                                    <div class="clear"></div>
                                </div><br>
                                <div class="message">
                                    <div class="floatleft"><label for="logpassword">Lozinka: &nbsp;</label></div>
                                    <div class="field"><input class="msginp" type="password" name="logpassword" id="logpassword" placeholder="Lozinka" /><span class="star" id="logpasswordstar"></span></div>
									<div class="clear"></div>
                                    <div id="forgotten"><a href="<?php URL ?>/login/forgotten/">Zaboravili ste lozinku?</a></div>
                                    <div class="clear"></div>
                                </div><br>
                                <div class="message">
                                    <div class="floatleft">&nbsp;</div>
                                    <input type="submit" name="logsubmit" id="logsubmit" class="reg_r" value="Prijavite se" />
									<input type="hidden" name="token" value="<?php echo $log_token; ?>"></div>
                                    <div class="clear"></div>
                           
                            </form>
                          </div>
                </div>
            </section>
 