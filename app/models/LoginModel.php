<?php

class LoginModel {

    public function loginRender() {
		try{
			Session::start();
			if (isset($_POST["logsubmit"])) {
				if (isset($_POST["token"])) {
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("login", $token);
				} else {
					$whitelist = array("logemail", "logpassword", "token", "logsubmit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u login formi");
							die("Hack-Attempt. Koristite samo prosledjena polja u formi");
						}
					}
				}
				if ($isValid) {
					$login = false;
					if (!empty($_POST['logemail']) && !empty($_POST['logpassword'])) {
						$email = filter_var($_POST['logemail'], FILTER_SANITIZE_EMAIL);
						$password = filter_var($_POST['logpassword'], FILTER_SANITIZE_STRING);
						$email = (new Validate)->securityFilter($email);
						$password = (new Validate)->securityFilter($password);
						$password = md5($password . TOKEN_FORM_SALT);
						$login = Users::GetAll("users.id, users.first_name, users.last_name, users.email, users.password, users.phone_number, users.registration_date,
						users.address, users.city, users.postal_code,users.ip, users.last_logged_time,users.last_logged_ip, users.privilege_id, users.status_id", "WHERE users.email='" . $email . "' AND users.password = '" . $password . "' AND users.status_id!=3 LIMIT 1");
						if ($login == null) {
							return $login = "Pogrešan unos ili niste registrovani korisnik!&nbsp;<a href='" . URL . "/register/index/' style='padding:5px;' class='reg_r' id='cmn'> registrujte se</a>";
						} else {
							foreach ($login as $user) {
								$user_id = $user->id;
								$first_name = $user->first_name;
								$last_name = $user->last_name;
								$email = $user->email;
								$phone_number = $user->phone_number;
								$registration_date = $user->registration_date;
								$address = $user->address;
								$city = $user->city;
								$postal_code = $user->postal_code;
								$ip = $user->ip;
								$last_logged_time = $user->last_logged_time;
								$last_logged_ip = $user->last_logged_ip;
								$privilege_id = $user->privilege_id;
								$status_id = $user->status_id;
							}
							$login = Users::GetOne($user_id);
							date_default_timezone_set("Europe/Belgrade");
							$login->last_logged_time = date("Y-m-j H:i:s ");
							$login->Update();

							Session::set("user_id", $user_id);
							Session::set("first_name", $first_name);
							Session::set("last_name", $last_name);
							Session::set("email", $email);
							Session::set("phone_number", $phone_number);
							Session::set("registration_date", $registration_date);
							Session::set("address", $address);
							Session::set("city", $city);
							Session::set("postal_code", $postal_code);
							Session::set("ip", $ip);
							Session::set("last_logged_time", $last_logged_time);
							Session::set("last_logged_ip", $last_logged_ip);
							Session::set("privilege_id", $privilege_id);
							Session::set("status_id", $status_id);
							return $login = true;
						}
					}
					return $login = "Morate popuniti oba polja";
				}
				Session::destroy();
			}
		}catch(Exception $e){
			$message=$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function generateLoginToken() {
		try{
			$token = (new Token)->generateToken("login");
			if($token===false){
				throw new Exception($token);
				return $token=false;
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška generisanja login tokena: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public  function forgottenRender() {
		try{
			Session::start();
			if (isset($_POST["forgotsubmit"])) {
				if (isset($_POST["token"])) {
					
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("forgotten", $token);
				} else {
					$whitelist = array("forgotemail", "token", "forgotsubmit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u formi zaboravljene lozinke");
							die("Hack-Attempt. Koristite samo prosledjena polja u formi");
						}
					}
				}
				if ($isValid) {
					
					$forgotten = false;
					if (!empty($_POST['forgotemail'])) {
						$email = filter_var($_POST['forgotemail'], FILTER_SANITIZE_EMAIL);
						$email = (new Validate)->securityFilter($email);
						$user = Users::GetAll("users.id ,users.email, users.token", "WHERE users.email='" . $email . "' AND users.status_id!=3 LIMIT 1");
						if (!$user) {
							return $forgotten = "Niste registrovani sa ovom email adresom! <a href='" . URL . "/register/index/' class='reg_r' id='cmn'> Registrujte se</a>";
						} else {
							foreach ($user as $user_token) {
								$token = $user_token->token;
							}
							try{
								$to=$email;
								$subject="Zaboravljena lozinka - MobITA!";
								$message = "Dobrodošli na sajt MobITA.\r\nDa biste pristupili svojim podacima kliknite na link " . URL . "/login/activation/" . $email . "/" . $token;
								$from_name="MobITA";
								$from_email=ADMIN;
								$send=(new Common)->sendEmail($to,$subject,$message,$from_name,$from_email);
								if($send!=false){
									return $forgotten = "Aktivacioni link Vam je poslat na email adresu!";
								}else{
									return $forgotten="Pokušajte ponovo kasnije.";
								}
							}catch(Exception $e){
								$message="Greška kod slanja emaila zaboravljene lozinke: ".$e->getMessage();
								$code=$e->getCode();
								$file=$e->getFile();
								$line=$e->getLine();
								$trace_as_string=$e->getTraceAsString();
								$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
							}
						}
					}
					return $forgotten = "Niste uneli email adresu!";
				}
				Session::destroy();
			}
		}catch(Exception $e){
			$message=$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function generateForgottenToken() {
		try{
			$token = (new Token)->generateToken("forgotten");
			if($token===false){
				throw new Exception($token);
				return $token=false;
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška generisanja forgotten tokena: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function activate($email="",$token = "") {
		try{
			Session::start();
			if (!empty($email) && !empty($token)) {
				$activate = false;
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);
				$email = (new Validate)->securityFilter($email);
				$token = filter_var($token, FILTER_SANITIZE_STRING);
				$token = (new Validate)->securityFilter($token);
				$validToken = Users::GetAll("users.id,users.first_name,users.last_name,users.token,users.email,users.phone_number,users.registration_date,users.address,users.city,users.postal_code,users.ip,users.last_logged_time,users.last_logged_ip,users.privilege_id,users.status_id", "WHERE users.email='" . $email . "' AND users.token='" . $token . "' AND users.status_id!=3 LIMIT 1");
				if ($validToken) {
					foreach ($validToken as $user) {
						$user_id = $user->id;
						$first_name = $user->first_name;
						$last_name = $user->last_name;
						$email = $user->email;
						$phone_number = $user->phone_number;
						$registration_date = $user->registration_date;
						$address = $user->address;
						$city = $user->city;
						$postal_code = $user->postal_code;
						$ip = $user->ip;
						$last_logged_time = $user->last_logged_time;
						$last_logged_ip = $user->last_logged_ip;
						$privilege_id = $user->privilege_id;
						$status_id = $user->status_id;
					}
					Session::set("user_id", $user_id);
					Session::set("first_name", $first_name);
					Session::set("last_name", $last_name);
					Session::set("email", $email);
					Session::set("phone_number", $phone_number);
					Session::set("registration_date", $registration_date);
					Session::set("address", $address);
					Session::set("city", $city);
					Session::set("postal_code", $postal_code);
					Session::set("ip", $ip);
					Session::set("last_logged_time", $last_logged_time);
					Session::set("last_logged_ip", $last_logged_ip);
					Session::set("privilege_id", $privilege_id);
					Session::set("status_id", $status_id);
					
					return $activate = "Idite na stranu za sa svojim podacima <a href='" . URL . "/user/update/' class='reg_r' id='cmn'>Vaši podaci</a>";
				} else {
					return $activate = "<a class='reg_r' id='cmn' href=" . URL . "/login/forgotten/>Neispravno, pokušajte ponovo!</a>";
				}
			} else {
				return $activate = "<a class='reg_r' id='cmn' href=" . URL . "/login/forgotten/>Neispravno, pokušajte ponovo!</a>";
			}
		}catch(Exception $e){
			$message=$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

   

}

?>