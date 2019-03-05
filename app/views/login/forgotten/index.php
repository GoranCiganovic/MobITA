
            <section id="main">
            	<div id="pass">
                	 <h2>Zaboravili ste lozinku?</h2>
                     <div class="block">
                     	
                        <h4>Upišite odgovarajuću e-mail adresu. Lozinka će Vam biti poslata na Vašu e-mail adresu.</h4>
                            <div id="forgoterror" class="error"><?php echo $forgotten; ?></div>
                            <form name="forgotten" action="<?php URL ?>/login/reveal/" method="POST">
                                <div class="message">
                                    <div class="floatleft"><label for="forgotemail">E-mail adresa: &nbsp;</label></div>
                                    <div class="field"><input class="msginp" type="text" name="forgotemail" id="forgotemail" placeholder="E-mail adresa"/><span class="star" id="forgotemailstar"></span></div>
                                    <div class="clear"></div>
                                </div><br>
                                <div class="message">
                                    <div class="floatleft">&nbsp;</div>
                                    <input type="submit" name="forgotsubmit" id="forgotsubmit" class="reg_r" value="Pošaljite" />
									<input type="hidden" name="token" value="<?php echo $for_token; ?>">
                                    <div class="clear"></div>
                                </div>
                            </form>
                        
                     </div>
                </div>
            </section>
         