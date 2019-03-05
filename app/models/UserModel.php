<?php

class UserModel {

    public function userRender() {
		try{
			Session::start();
			$id = Session::get("user_id");
			if (!empty($id) && is_numeric($id)) {
				$user = Users::GetOne($id);
				if($user===false){
					throw new Exception($user);
				}else{
					return $user;
				}
			}
		}catch(Exception $e){
			$message="Greška kod prikaza korisnika: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function updateRender() {
		try{
			Session::start();
			if (isset($_POST["userupdatesubmit"])) {
				if (isset($_POST["token"])) {
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("update", $token);
				} else {
					$whitelist = array("userupdatefname", "userupdatelname", "userupdateemail", "userupdatepassword", "userupdaterepeatpassword", "userupdatephnumber", "userupdateaddress", "userupdatecity", "userupdatepcode", "update", "token", "userupdatesubmit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u formi za izmenu podataka korisnika");
							die("Hack-Attempt. Koristite samo prosledjena polja u formi");
						}
					}
				}
				if ($isValid) {
					$update = false;
					if (empty($_POST['userupdatefname']) && empty($_POST['userupdatelname']) && empty($_POST['userupdateemail']) && empty($_POST['userupdatepassword']) && empty($_POST['userupdaterepeatpassword']) && empty($_POST['userupdatephnumber']) && empty($_POST['userupdateaddress']) && empty($_POST['userupdatecity']) && empty($_POST['userupdatepcode'])) {
						return $update = "Niste popunili nijedno polje.";
					} else {
						$id = Session::get("user_id");
						$user = Users::GetOne($id);

						if (!empty($_POST['userupdatefname'])) {
							$first_name = filter_var($_POST['userupdatefname'], FILTER_SANITIZE_STRING);
							$first_name = (new Validate)->securityFilter($first_name);
							if (!preg_match("/^[a-zA-Z ]{2,50}$/", $first_name)) {
								return $update = "Neispravan unos imena.";
							}
							$user->first_name = $first_name;
							$user->Update();
						}
						if (!empty($_POST['userupdatelname'])) {
							$last_name = filter_var($_POST['userupdatelname'], FILTER_SANITIZE_STRING);
							$last_name = (new Validate)->securityFilter($last_name);
							if (!preg_match("/^[a-zA-Z ]{2,50}$/", $last_name)) {
								return $update = "Neispravan unos prezimena.";
							}
							$user->last_name = $last_name;
							$user->Update();
						}
						if (!empty($_POST['userupdateemail'])) {
							$email = filter_var($_POST['userupdateemail'], FILTER_SANITIZE_EMAIL);
							$email = (new Validate)->securityFilter($email);
							if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
								return $update = "Neispravan unos email adrese.";
							}
							$update = Users::GetAll("users.email", "WHERE users.email='" . $email . "' AND users.id!='" . $id . "' LIMIT 1");
							if ($update) {
								return $update = "Korisnik sa unetom email adresom već postoji!";
							} else {
								$user->email = $email;
								$user->Update();
							}
						}
						if (!empty($_POST['userupdatepassword'])) {
							if(empty($_POST['userupdaterepeatpassword'])){
								return $register = "Popunite oba polja za unos lozinke.";
							}
							$password = filter_var($_POST['userupdatepassword'], FILTER_SANITIZE_STRING);
							$password = (new Validate)->securityFilter($password);
							$repeat_password = filter_var($_POST['userupdaterepeatpassword'], FILTER_SANITIZE_STRING);
							$repeat_password = (new Validate)->securityFilter($repeat_password);
							if (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,40}/', $password)) {
								return $register = "Neispravan unos lozinke. Lozinka mora da sadrži najmanje 8 karaktera, od toga jedno malo slovo, jedno veliko slovo, jedan broj i bez razmaka.";
							}
							if ($repeat_password !== $password) {
								return $register = "Neispravan ponovni unos lozinke.";
							}
							$password = md5($password . TOKEN_FORM_SALT);
							$user->password = $password;
							$user->Update();
						}
						if(!empty($_POST['userupdaterepeatpassword'])){
							if(empty($_POST['userupdatepassword'])){
								return $register = "Popunite oba polja za unos lozinke.";
							}
								
						}
						
						if (!empty($_POST['userupdatephnumber'])) {
							$phone_number = filter_var($_POST['userupdatephnumber'], FILTER_SANITIZE_NUMBER_INT);
							$phone_number = (new Validate)->securityFilter($phone_number);
							if (!preg_match("/^[0-9 ]{6,12}$/", $phone_number)) {
								return $update = "Neispravan unos broja telefona.";
							}
							$user->phone_number = $phone_number;
							$user->Update();
						}
						if (!empty($_POST['userupdateaddress'])) {
							$address = filter_var($_POST['userupdateaddress'], FILTER_SANITIZE_STRING);
							$address = (new Validate)->securityFilter($address);
							if (strlen($address) > 50 || !preg_match("/^[0-9a-zA-Z ]*$/", $address)) {
								return $update = "Neispravan unos adrese.";
							}
							$user->address = $address;
							$user->Update();
						}
						if (!empty($_POST['userupdatecity'])) {
							$city = filter_var($_POST['userupdatecity'], FILTER_SANITIZE_STRING);
							$city = (new Validate)->securityFilter($city);
							if (!preg_match("/^[a-zA-Z ]{2,20}$/", $city)) {
								return $update = "Neispravan unos naziva grada.";
							}
							$user->city = $city;
							$user->Update();
						}
						if (!empty($_POST['userupdatepcode'])) {
							$postal_code = filter_var($_POST['userupdatepcode'], FILTER_SANITIZE_NUMBER_INT);
							$postal_code = (new Validate)->securityFilter($postal_code);
							if (!preg_match("/^[0-9]{5}$/", $postal_code)) {
								return $update = "Neispravan unos poštanskog broja.";
							}
							$user->postal_code = $postal_code;
							$user->Update();
						}

						return $update = "Vidite svoje podatke <a href='" . URL . "/user/index/' class='reg_r' id='cmn'>Vaš profil</a>";
					}
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

    public function generateUpdateToken() {
		try{
			$token = (new Token)->generateToken("update");
			if($token===false){
				throw new Exception($token);
				return $token=false;
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška generisanja update tokena: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderUsers($id="") {
		try{
			Session::start();
			$q1="users.id,users.first_name, users.last_name, users.email, users.phone_number, users.address, users.city, users.registration_date, users.ip,users.last_logged_time,users.last_logged_ip, users.postal_code, users.status_id, user_status.name as status";
			$q2="JOIN user_status ON user_status.id=users.status_id WHERE users.privilege_id=3 ";
			if(isset($_POST['active'])){
				try{
					$q2.=" AND user_status.id=1 ";
					$users=Users::GetAll($q1,$q2);
					if($users===false){
						throw new Exception($users);
					}else{
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza aktivnih korisnika: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['non_active'])){
				try{
					$q2.=" AND user_status.id=2 ";
					$users=Users::GetAll($q1,$q2);
					if($users===false){
						throw new Exception($users);
					}else{
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza neaktivnih korisnika: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['banned'])){
				try{
					$q2.=" AND user_status.id=3 ";
					$users=Users::GetAll($q1,$q2);
					if($users===false){
						throw new Exception($users);
					}else{
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza zabranjenih korisnika: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['profile'])){
				try{
					$q2.=" AND users.id ='{$id}' ";
					$users=Users::GetAll($q1,$q2);
					if($users===false){
						throw new Exception($users);
					}else{
						return $users;
						var_dump($users);
					}
				}catch(Exception $e){
					$message="Greška kod prikaza korisničkog profila: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['act'])){
				try{
					$active=Users::GetOne($id);
					if($active===false){
						throw new Exception($active);
					}else{
						if($active->status_id != "1"){
							$active->status_id="1";
							$active->Update();
							try{
								$to=$active->email;
								$subject="Dobro došli u Mobitu!";
								$message="Poštovani ". $active->first_name . " " . $active->last_name . ",\r\nMobITA Vam želi dobrodošlicu.Uspešno ste se registrovali sa email adresom " . $active->email . " i sada Vam je omogućeno naručivanje mobilnih telefona na našem web sajtu.Zahvaljujemo se na ukazanom poverenju.\r\n*MobITA se obavezuje na privatnost Vaših ličnih podataka koji će biti korišćeni isključivo u svrhu kupovine na našem sajtu.\r\nVaša MobITA";
								$from_name="MobITA";
								$from_email=ADMIN;
								$send=(new Common)->sendEmail($to,$subject,$message,$from_name,$from_email);
							}catch(Exception $e){
								$message="Greška kod slanja emaila prilikom aktiviranja korisničkog profila: ".$e->getMessage();
								$code=$e->getCode();
								$file=$e->getFile();
								$line=$e->getLine();
								$trace_as_string=$e->getTraceAsString();
								$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
							}
						}
						$q2.=" AND users.id ='{$id}' ";
						$users=Users::GetAll($q1,$q2);
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod postavaljanja korisnika na aktivan status: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['bann'])){
				try{
					$banned=Users::GetOne($id);
					$banned->status_id="3";
					$banned->Update();
					$q2.=" AND users.id ='{$id}' ";
					$users=Users::GetAll($q1,$q2);
					if($banned===false){
						throw new Exception($banned);
					}else{
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod postavaljanja korisnika na zabranjen status: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else{
				try{
					$users=Users::GetAll($q1,$q2);
					if($users===false){
						throw new Exception($users);
						
					}else{
						return $users;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza korisnika: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
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

	public function renderComments($id=""){
		try{
			Session::start();
			$q1="comments.id as comment_id, comments.comment as comment, comments.date as comment_date, comments.user_id as comment_user_id, comments.phone_id as comment_phone_id, comments.status_id as comment_status_id, users.id as user_id, users.first_name as first_name, users.last_name as last_name, phones.id as phone_id, phones.name as phone_name, comment_status.id as status_id, comment_status.name as status_name";
			$q2="JOIN phones ON phones.id=comments.phone_id JOIN users ON users.id=comments.user_id JOIN comment_status ON comment_status.id=comments.status_id ";
			if(isset($_POST['on_hold'])){
				try{
					$q2.=" WHERE comments.status_id=1 ";
					$comments=Comments::GetAll($q1,$q2);
					if($comments===false){
						throw new Exception($comments);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza komentara na čekanju: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['approved'])){
				try{
					$q2.=" WHERE comments.status_id=2 ";
					$comments=Comments::GetAll($q1,$q2);
					if($comments===false){
						throw new Exception($comments);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza odobrenih komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['denial'])){
				try{
					$q2.=" WHERE comments.status_id=3 ";
					$comments=Comments::GetAll($q1,$q2);
					if($comments===false){
						throw new Exception($comments);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza zabranjenih komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['content'])){
				try{
					$q2.=" WHERE comments.id ='{$id}' ";
					$comments=Comments::GetAll($q1,$q2);
					if($comments===false){
						throw new Exception($comments);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza sadržaja komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['app'])){
				try{
					$approved=Comments::GetOne($id);
					$approved->status_id="2";
					$approved->Update();
					$q2.=" WHERE comments.id ='{$id}' ";
					$comments=Comments::GetAll($q1,$q2);
					if($approved===false){
						throw new Exception($approved);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod postavljanja odobrenog komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else if(isset($_POST['den'])){
				try{
					$denial=Comments::GetOne($id);
					$denial->status_id="3";
					$denial->Update();
					$q2.=" WHERE comments.id ='{$id}' ";
					$comments=Comments::GetAll($q1,$q2);
					if($denial===false){
						throw new Exception($denial);
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod postavljanja zabranjenog komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}else{
				try{
					$comments=Comments::GetAll($q1,$q2);
					if($comments===false){
						throw new Exception($comments);
						
					}else{
						return $comments;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza komentara: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
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
	
	

	

}

?>
