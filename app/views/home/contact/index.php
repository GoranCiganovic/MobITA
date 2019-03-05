	<section id="main">
            	<div id="contact">
                	<h2>Kontakt</h2>
                    <div class="block">
                    <p>MobITA</p>
                    <p>Adresa: Cara Dušana 34, 11080 Zemun, Beograd, Srbija</p>
                    <p>Telefoni: 011/33-31-1200, 068/100-300</p>
                    <p>Radno vreme: 9-20h</p>
                    
                    <div id="iframe">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2828.6413901267647!2d20.402136149031833!3d44.84923600193412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a65b4260a66c1%3A0x34f2a4e93aeea57f!2sCara+Du%C5%A1ana+34%2C+Beograd!5e0!3m2!1sen!2srs!4v1469097649296"  allowfullscreen></iframe>
                   </div>
				   <?php if($privilege!=2 && $privilege!=1){ ?>
                   <div id="message">
                       <h4>Pošaljite poruku</h4>
                       <div id="contacterror" class="error"><?php echo $message;?></div>
                        <form  id="formmsg" name="msg" action="<?php URL ?>/home/contact/" method="POST" >
                        	<div class="messinp">
                                <div class="floatleft">Ime i prezime: &nbsp;</div>
                                <div class="field"><input class="msginp" type="text" name="msgname" id="msgname"  placeholder="Ime i prezime"/><span class="star" id="msgnamestar"></span></div>
                                <div class="clear"></div>
							</div><br>
                            <div class="messinp">
                                <div class="floatleft">E-mail adresa: &nbsp;</div>
                                <div class="field"><input class="msginp" type="text" name="msgemail" id="msgemail"  placeholder="E-mail adresa" /><span class="star" id="msgemailstar"></span></div>
                                <div class="clear"></div>
							</div><br>
                            <div class="messinp">
                                <div class="floatleft">Poruka: &nbsp;</div>
                                <div class="field"><textarea class="msginp" name="msgmessage" id="msgmessage" placeholder="Unesite poruku"></textarea><span class="star" id="msgmessagestar"></span></div>
                                <div class="clear"></div>
							</div><br>
                            <div class="messinp">
                            	<div class="floatleft">&nbsp;</div>
								<div class="field">
                                <input type="submit" name="msgsubmit" id="msgsubmit" class="reg_r" value="Pošaljite" />
                                <input type="reset" name="msgreset" id="msgreset" class="reg_r" value="Poništite" /></div>
                                <div class="clear"></div>
							</div>
                        </form>
					</div>
				   <?php } ?>
                   </div>
                </div>
            </section>
