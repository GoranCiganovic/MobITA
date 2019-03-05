<?php

class RegisterModel {

    public function registerRender() {
		try{
			Session::start();
			if (isset($_POST["registersubmit"])) {
				$isValid = false;
				if (isset($_POST["token"])) {
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("register", $token);
				} else {
					$whitelist = array("registerfname", "registerlname", "registeremail", "registerpassword", "registerrepeatpassword", "registerphonenumber", "registeraddress", "registercity", "registerpostalcode", "register", "token", "registersubmit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u formi za registraciju");
							die("Hack-Attempt. Koristite samo prosleđena polja u formi");
						}
					}
				}
				if ($isValid) {
					$register = false;
					if (!empty($_POST['registerfname']) && !empty($_POST['registerlname']) && !empty($_POST['registeremail']) && !empty($_POST['registerpassword']) && !empty($_POST['registerrepeatpassword']) && !empty($_POST['registerphonenumber']) && !empty($_POST['registeraddress']) && !empty($_POST['registercity']) && !empty($_POST['registerpostalcode'])) {
						$first_name = filter_var($_POST['registerfname'], FILTER_SANITIZE_STRING);
						$first_name = (new Validate)->securityFilter($first_name);
						$last_name = filter_var($_POST['registerlname'], FILTER_SANITIZE_STRING);
						$last_name = (new Validate)->securityFilter($last_name);
						$email = filter_var($_POST['registeremail'], FILTER_SANITIZE_EMAIL);
						$email = (new Validate)->securityFilter($email);
						$password = filter_var($_POST['registerpassword'], FILTER_SANITIZE_STRING);
						$password = (new Validate)->securityFilter($password);
						$repeat_password = filter_var($_POST['registerrepeatpassword'], FILTER_SANITIZE_STRING);
						$repeat_password = (new Validate)->securityFilter($repeat_password);
						$phone_number = filter_var($_POST['registerphonenumber'], FILTER_SANITIZE_NUMBER_INT);
						$phone_number = (new Validate)->securityFilter($phone_number);
						date_default_timezone_set("Europe/Belgrade");
						$registration_date = date("Y-m-j H:i:s ");
						$address = filter_var($_POST['registeraddress'], FILTER_SANITIZE_STRING);
						$address = (new Validate)->securityFilter($address);
						$city = filter_var($_POST['registercity'], FILTER_SANITIZE_STRING);
						$city = (new Validate)->securityFilter($city);
						$postal_code = filter_var($_POST['registerpostalcode'], FILTER_SANITIZE_NUMBER_INT);
						$postal_code = (new Validate)->securityFilter($postal_code);
						$ip = $_SERVER['REMOTE_ADDR'];
						$ip = (new Validate)->securityFilter($ip);
						$last_logged_time = date("Y-m-d h:i:s");
						$last_logged_ip=$_SERVER['REMOTE_ADDR'];
						$privilege_id = "3";
						$status_id = "2";


						if (!preg_match("/^[a-zA-Z ]{2,50}$/", $first_name)) {
							return $register = "Neispravan unos imena.";
						}
						if (!preg_match("/^[a-zA-Z ]{2,50}$/", $last_name)) {
							return $register = "Neispravan unos prezimena.";
						}
						if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
							return $register = "Neispravan unos email adrese.";
						}
						if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $password)) {
							return $register = "Neispravan unos lozinke. Lozinka mora da sadrži najmanje 8 karaktera, od toga jedno malo slovo, jedno veliko slovo, jedan broj i bez razmaka.";
						}
						if ($repeat_password !== $password) {
							return $register = "Neispravan ponovni unos lozinke.";
						}
						if (!preg_match("/^[0-9 ]{6,12}$/", $phone_number)) {
							return $register = "Neispravan unos broja telefona.";
						}
						if (strlen($address) > 100 || !preg_match("/^[0-9a-zA-Z ]*$/", $address)) {
							return $register = "Neispravan unos adrese.";
						}
						if (!preg_match("/^[a-zA-Z ]{2,50}$/", $city)) {
							return $register = "Neispravan unos naziva grada.";
						}
						if (!preg_match("/^[0-9]{5}$/", $postal_code)) {
							return $register = "Neispravan unos poštanskog broja.";
						}
						$password = md5($password . TOKEN_FORM_SALT);

						$register = (new Users)->GetAll("users.email", "WHERE users.email='" . $email . "' LIMIT 1");
						if ($register) {
							return $register = "Korisnik sa unetom email adresom već postoji!";
						} else {
							$user = (new Users);
							$user->first_name = $first_name;
							$user->last_name = $last_name;
							$user->email = $email;
							$user->password = $password;
							$user->phone_number = $phone_number;
							$user->registration_date = $registration_date;
							$user->address = $address;
							$user->city = $city;
							$user->postal_code = $postal_code;
							$user->ip = $ip;
							$user->last_logged_time = $last_logged_time;
							$user->last_logged_ip = $last_logged_ip;
							$user->token = $token;
							$user->privilege_id = $privilege_id;
							$user->status_id = $status_id;
							$user->Insert();
							try{
								$to=ADMIN;
								$subject="MobITA-novi korisnik!";
								$message="Imate novog korisnika na sajtu MobITA-www.mobita.goranciganovic.com";
								$from_name="MobITA";
								$from_email="NE ODGOVARAJ NA OVU PORUKU";
								$send=(new Common)->sendEmail($to,$subject,$message,$from_name,$from_email);
							}catch(Exception $e){
								$message="Greška kod slanja emaila administratoru prilikom registracije korisnika: ".$e->getMessage();
								$code=$e->getCode();
								$file=$e->getFile();
								$line=$e->getLine();
								$trace_as_string=$e->getTraceAsString();
								$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
							}
							$user=Users::GetAll("users.id,users.first_name","WHERE users.email='{$email}'");
							try{
								 if ($user===false) {
									 throw new Exception($user);
								} 
							}catch(Exception $e) {
								$message="Greška kod registracije korisnika: ".$e->getMessage();
								$code=$e->getCode();
								$file=$e->getFile();
								$line=$e->getLine();
								$trace_as_string=$e->getTraceAsString();
								$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
							}
							
							foreach($user as $id){
								$user_id=$id->id;
								$first_name=$id->first_name;
							}
							Session::set("user_id",$user_id);
							Session::set("privilege_id", $privilege_id);
							Session::set("first_name", $first_name);
							
							return $register = true;
						}
					}
					return $register = "Morate popuniti sva polja";
					Session::destroy();
				}
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

    public function generateRegisterToken() {
		try{
			$token = (new Token)->generateToken("register");
			if($token===false){
				throw new Exception($token);
				return $token=false;
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška generisanja tokena kod registracije: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

}

?>
