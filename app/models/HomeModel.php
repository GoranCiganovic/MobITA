<?php

class HomeModel {

    public function sitedate() {
		try{
			$date = (new Common)->sitedate();
			if($date===false){
				throw new Exception($date);
				return $date=false;
			}else{
				return $date;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza datuma na sajtu: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllBrands() {
		try{
			$brands = Brands::GetAll();
			if($brands===false){
				throw new Exception($brands);
				return $brands=false;
			}else{
				return $brands;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza proizvođača u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
        
    }

    public function renderAllSystems() {
		try{
			$systems = Systems::GetAll();
			if($systems===false){
				throw new Exception($systems);
				return $systems=false;
			}else{
				return $systems;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza operativnih sistema u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllRams() {
		try{
			$rams = RamMemories::GetAll();
			if($rams===false){
				throw new Exception($rams);
				return $rams=false;
			}else{
				return $rams;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza RAM memorija u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllInts() {
		try{
			$ints = InternalMemories::GetAll();
			if($ints===false){
				throw new Exception($ints);
				return $ints=false;
			}else{
				return $ints;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza Interne memorija u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllSims() {
		try{
			$sims = SimSlots::GetAll();
			if($sims===false){
				throw new Exception($sims);
				return $sims=false;
			}else{
				return $sims;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza SIM Slot-a u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllColors() {
		try{
			$colors = Colors::GetAll();
			if($colors===false){
				throw new Exception($colors);
				return $colors=false;
			}else{
				return $colors;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza boja u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderFavorites() {
		try{
			$favorites = Phones::GetAll(" phones.id as phone_id, phones.name as phone_name, images.path as img_path, images.description as img_desc, phones.price as phone_price", "JOIN images ON phones.id=images.phone_id WHERE phones.price > 80.000 AND phones.stock > 0 AND images.status_id =1 ");
			if($favorites===false){
				throw new Exception($favorites);
				return $favorites=false;
			}else{
				return $favorites;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza telefona na početnoj strani: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllPhones() {
		try{
			$allphones = Phones::GetAll("phones.id as phone_id, phones.name as phone_name, phones.price as phone_price,images.path as img_path,images.description as img_desc", "JOIN images ON phones.id=images.phone_id WHERE images.status_id =1 AND phones.stock > 0");
			if($allphones===false){
				throw new Exception($allphones);
				return $allphones=false;
			}else{
				return $allphones;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza svih telefona: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllBatteries() {
		try{
			$batteries = Batteries::GetAll();
			if($batteries===false){
				throw new Exception($batteries);
				return $batteries=false;
			}else{
				return $batteries;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza baterija u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllScreenResolutions() {
		try{
			$screen_resolutions = ScreenResolutions::GetAll();
			if($screen_resolutions===false){
				throw new Exception($screen_resolutions);
				return $screen_resolutions=false;
			}else{
				return $screen_resolutions;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza rezolucije ekrana u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllScreenSizes() {
		try{
			$screen_sizes = ScreenSizes::GetAll();
			if($screen_sizes===false){
				throw new Exception($screen_sizes);
				return $screen_sizes=false;
			}else{
				return $screen_sizes;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza veličine ekrana u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllBackCameras() {
		try{
			$back_cameras = BackCameras::GetAll();
			if($back_cameras===false){
				throw new Exception($back_cameras);
				return $back_cameras=false;
			}else{
				return $back_cameras;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza zadnje kamere u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllFrontCameras() {
		try{
			$front_cameras = FrontCameras::GetAll();
			if($front_cameras===false){
				throw new Exception($front_cameras);
				return $front_cameras=false;
			}else{
				return $front_cameras;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza prednje kamere u sidebar-u: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function renderAllPhoneStatus() {
		try{
			$phone_status = PhoneStatus::GetAll();
			if($phone_status===false){
				throw new Exception($phone_status);
				return $phone_status=false;
			}else{
				return $phone_status;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza statusa telefona: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }
	
	public function renderAllPhonesImage(){
		try{
			$phones = Phones::GetAll();
			if($phones===false){
				throw new Exception($phones);
				return $phones=false;
			}else{
				return $phones;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza modela telefona kod administracije: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
	}
	
	
    public function renderMessage() {
		try{
			if (isset($_POST['msgsubmit'])) {
				$message = false;
				if (!empty($_POST['msgname']) && !empty($_POST['msgemail']) && !empty($_POST['msgmessage'])) {
					$name = filter_var($_POST['msgname'], FILTER_SANITIZE_STRING);
					$email = filter_var($_POST['msgemail'], FILTER_SANITIZE_EMAIL);
					$msg = filter_var($_POST['msgmessage'], FILTER_SANITIZE_STRING);
					if (!preg_match("/^[a-zA-Z ]{2,50}$/", $name)) {
						return $message = "Neispravan unos imena.";
					}
					if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
						return $message = "Neispravan unos email adrese.";
					}
					if (!preg_match("/^[0-9a-zA-Z ]{3,1000}$/", $msg)) {
						return $message = "Neispravan unos poruke.";
					}
					try{
						$to= ADMIN;
						$subject="MobITA-poruka korisnika!";
						$message="Poruka sa sajta MobITA od \r\nIme: " . $name . "\r\nEmail: " . $email . "\r\nSadržaj: " . $msg;
						$from_name=$name;
						$from_email=$email;
						$send=(new Common)->sendEmail($to,$subject,$message,$from_name,$from_email);
						if($send===false) {
							 throw new Exception($send);
							 return $message = "Pokušajte ponovo kasnije.";
						} else{
							return $message = "Poslali ste poruku.";
						}
					}catch(Exception $e){
						$message="Greška kod slanja poruke preko emaila na kontakt strani: ".$e->getMessage();
						$code=$e->getCode();
						$file=$e->getFile();
						$line=$e->getLine();
						$trace_as_string=$e->getTraceAsString();
						$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
						return $message = "Pokušajte ponovo kasnije.";
					}
				}
				return $message = "Niste popunili potrebna polja";
			}else{
				return $message=false;
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

    public function sidebarRender() {
		try{
			$q1 = "phones.id as phone_id, phones.name as phone_name, phones.price as phone_price , images.path as img_path, images.description as img_desc ";
			$q2 = "JOIN images ON phones.id=images.phone_id JOIN brands ON phones.brand_id=brands.id JOIN systems ON phones.system_id=systems.id JOIN ram_memories ON phones.ram_memory_id=ram_memories.id JOIN internal_memories ON phones.internal_memory_id=internal_memories.id JOIN sim_slots ON phones.sim_slot_id=sim_slots.id JOIN colors ON phones.color_id=colors.id JOIN screen_sizes ON phones.screen_size_id=screen_sizes.id JOIN back_cameras ON phones.back_camera_id=back_cameras.id WHERE images.status_id =1 AND phones.status_id=1 AND phones.stock > 0 ";
			if (empty($_POST['brands'])) {
				$q2.=" ";
			} else {
				$brands = (new Validate)->securityFilter($_POST['brands']);
				$id = (new Common)->comaString($brands);
				$q2.=" AND brands.id IN (" . $id . ") ";
			}

			if (empty($_POST['prices1'])) {
				$q2.="";
			} else {
				$prices1 = Phones::GetAll("phones.id", "where phones.price < 20.000 ");
				$id = (new Common)->comaArray($prices1);
				$q2.=" AND phones.id IN (" . $id . ")  ";
			}

			if (empty($_POST['prices2'])) {
				$q2.="";
			} else {
				$prices2 = Phones::GetAll("phones.id", "where phones.price between 20.000 and 60.000");
				$id = (new Common)->comaArray($prices2);
				if (!empty($_POST['prices1'])) {
					$q2.=" OR phones.id IN (" . $id . ") ";
				} else {
					$q2.=" AND phones.id IN (" . $id . ")";
				}
			}
			if (empty($_POST['prices3'])) {
				$q2.="";
			} else {
				$prices3 = Phones::GetAll("phones.id", "where phones.price > 60.000");
				$id = (new Common)->comaArray($prices3);
				if (!empty($_POST['prices1']) || !empty($_POST['prices2'])) {
					$q2.=" OR phones.id IN (" . $id . ") AND images.status_id =1";
				} else {
					$q2.=" AND phones.id IN (" . $id . ") ";
				}
			}
			if (empty($_POST['systems'])) {
				$q2.=" ";
			} else {
				$systems = (new Validate)->securityFilter($_POST['systems']);
				$id = (new Common)->comaString($systems);
				$q2.=" AND systems.id IN (" . $id . ") ";
			}
			if (empty($_POST['screens1'])) {
				$q2.="";
			} else {
				$screens1 = ScreenSizes::GetAll("screen_sizes.id", "where screen_sizes.size < 3.8");
				$id = (new Common)->comaArray($screens1);
				$q2.=" AND screen_sizes.id IN (" . $id . ") ";
			}
			if (empty($_POST['screens2'])) {
				$q2.="";
			} else {
				$screens2 = ScreenSizes::GetAll("screen_sizes.id", "where screen_sizes.size between 3.8 and 5.0");
				$id = (new Common)->comaArray($screens2);
				if (!empty($_POST['screens1'])) {
					$q2.=" OR screen_sizes.id IN (" . $id . ") ";
				} else {
					$q2.=" AND screen_sizes.id IN (" . $id . ") ";
				}
			}
			if (empty($_POST['screens3'])) {
				$q2.="";
			} else {
				$screens3 = ScreenSizes::GetAll("screen_sizes.id", "where screen_sizes.size > 5.0");
				$id = (new Common)->comaArray($screens3);
				if (!empty($_POST['screens1']) || !empty($_POST['screens2'])) {
					$q2.=" OR screen_sizes.id IN (" . $id . ") AND images.status_id =1";
				} else {
					$q2.=" AND screen_sizes.id IN (" . $id . ") ";
				}
			}
			if (empty($_POST['rams'])) {
				$q2.=" ";
			} else {
				$rams = (new Validate)->securityFilter($_POST['rams']);
				$id = (new Common)->comaString($rams);
				$q2.=" AND ram_memories.id IN (" . $id . ") ";
			}
			if (empty($_POST['ints'])) {
				$q2.=" ";
			} else {
				$ints = (new Validate)->securityFilter($_POST['ints']);
				$id = (new Common)->comaString($ints);
				$q2.=" AND internal_memories.id IN (" . $id . ") ";
			}
			if (empty($_POST['sims'])) {
				$q2.=" ";
			} else {
				$sims = (new Validate)->securityFilter($_POST['sims']);
				$id = (new Common)->comaString($sims);
				$q2.=" AND sim_slots.id IN (" . $id . ") ";
			}
			if (empty($_POST['colors'])) {
				$q2.=" ";
			} else {
				$colors = (new Validate)->securityFilter($_POST['colors']);
				$id = (new Common)->comaString($colors);
				$q2.=" AND colors.id IN (" . $id . ") ";
			}
			if (empty($_POST['cameras1'])) {
				$q2.="";
			} else {
				$cameras1 = BackCameras::GetAll("back_cameras.id", "where back_cameras.name < 8.0 ");
				$id = (new Common)->comaArray($cameras1);
				$q2.=" AND back_cameras.id IN (" . $id . ") ";
			}
			if (empty($_POST['cameras2'])) {
				$q2.="";
			} else {
				$cameras2 = BackCameras::GetAll("back_cameras.id", "where back_cameras.name between 8.0 and 16.0");
				$id = (new Common)->comaArray($cameras2);
				if (!empty($_POST['cameras1'])) {
					$q2.=" OR back_cameras.id IN (" . $id . ") ";
				} else {
					$q2.=" AND back_cameras.id IN (" . $id . ") ";
				}
			}
			if (empty($_POST['cameras3'])) {
				$q2.="";
			} else {
				$cameras3 = (new BackCameras)->GetAll("back_cameras.id", "where back_cameras.name > 16.0 ");
				$id = (new Common)->comaArray($cameras3);
				if (!empty($_POST['cameras1']) || !empty($_POST['cameras2'])) {
					$q2.=" OR back_cameras.id IN (" . $id . ") AND images.status_id =1";
				} else {
					$q2.=" AND back_cameras.id IN (" . $id . ") ";
				}
			}
			$sidebarfilter = Phones::GetAll($q1, $q2);
			if($sidebarfilter===false){
				throw new Exception($sidebarfilter);
				return $sidebarfilter=false;
			}else{
				return $sidebarfilter;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza u sidebaru: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function searchRender($input="") {
		try{
			$q1 = "phones.id as phone_id, phones.name as phone_name, phones.price as phone_price, images.name as img_name, images.path as img_path, images.description as img_desc, brands.name as brand_name, systems.name as system_name, colors.name as color_name";
			$q2 = "JOIN images ON phones.id=images.phone_id 
			JOIN brands ON phones.brand_id=brands.id 
			JOIN systems ON phones.system_id=systems.id 
			JOIN colors ON phones.color_id=colors.id 
			WHERE images.status_id =1 
			AND phones.stock > 0
			AND phones.status_id=1
			AND images.description != 'back_image'";
			if(!empty($input)){
				$input = (new Validate)->securityFilter($input);
				 $q2.=" AND phones.name like '%$input%' 
						OR systems.name like '%$input%' 
						OR colors.name like '%$input%' ";
			}else{
				return $input=false;
			}
			$search = Phones::GetAll($q1, $q2);
			if($search===false){
				throw new Exception($search);
				return $search=false;
			}else{
				return $search;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza rezutata pretrage: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function singleRender($id) {
		try{
			Session::start();
			if (is_numeric($id)) {
				Session::set("phone_id", $id);
				$id = (new Validate)->securityFilter($id);
				$single = Phones::GetAll("phones.id as phone_id, phones.name as phone_name, phones.price as phone_price, phones.stock as phone_stock, phones.dimensions as phone_dim, phones.weight as phone_weight, phones.date as phone_date, phones.status_id as phone_status_id,phone_status.name as phone_status_name,images.name as img_name, images.path as img_path, images.description as img_desc, brands.id as brand_id, brands.name as brand_name, brands.website as br_website, brands.logo as brand_logo, systems.id as system_id, systems.name as system_name, colors.id as color_id,colors.name as color_name, screen_resolutions.id as screen_resolution_id, screen_resolutions.resolution as scr_res, screen_sizes.id as screen_size_id,screen_sizes.size as scr_size, ram_memories.id as ram_memory_id,ram_memories.name as ram_name, internal_memories.id as internal_memory_id,internal_memories.name as int_name, sim_slots.id as sim_slot_id,sim_slots.name as sim_name,back_cameras.id as back_camera_id, back_cameras.name as bcam_name,front_cameras.id as front_camera_id, front_cameras.name as fcam_name, batteries.id as battery_id,batteries.name as batt_name", "JOIN images ON phones.id=images.phone_id 
				JOIN brands ON phones.brand_id=brands.id 
				JOIN systems ON phones.system_id=systems.id 
				JOIN ram_memories ON phones.ram_memory_id=ram_memories.id 
				JOIN internal_memories ON phones.internal_memory_id=internal_memories.id 
				JOIN sim_slots ON phones.sim_slot_id=sim_slots.id 
				JOIN colors ON phones.color_id=colors.id 
				JOIN screen_sizes ON phones.screen_size_id=screen_sizes.id 
				JOIN screen_resolutions ON phones.screen_resolution_id=screen_resolutions.id 
				JOIN back_cameras ON phones.back_camera_id=back_cameras.id 
				JOIN front_cameras ON phones.front_camera_id=front_cameras.id 
				JOIN batteries ON phones.battery_id=batteries.id  
				JOIN phone_status ON phones.status_id=phone_status.id
				WHERE images.status_id=1 
				AND phones.stock > 0
				AND phones.id=" . $id . " LIMIT 1 ");
				foreach($single as $phone){
					$phone_id=$phone->phone_id;
				}
				Session::set("phone_id",$phone_id);
			}
			if($single===false){
				throw new Exception($single);
				return $single=false;
			}else{
				return $single;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza rezutata pojedinačnog telefona: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}  
    }

    public function backImageRender($id) {
		try{
			if (is_numeric($id)) {
				$id = (new Validate)->securityFilter($id);
				$backImage = Phones::GetAll("phones.id as phone_id, images.name as img_name, images.path as img_path, images.description as img_desc", "JOIN images ON phones.id=images.phone_id 
				WHERE images.status_id=2 
				AND phones.stock > 0
				AND phones.id=" . $id . " LIMIT 1 ");
			}
			if($backImage===false){
				throw new Exception($backImage);
				return $backImage=false;
			}else{
				return $backImage;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza slike od pozadi telefona: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		} 
    }

    public function showlog($data) {
		try{
			$data = Session::get($data);
			$log = null;
			if ($data == true) {
				return $log="<a href='".URL."/login/logout/' class='button'>Odjavite se </a>";
			} else {
				return $log="<a href='".URL."/login/index/' class='button'>Prijavite se </a>";
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

    public function showprofile($data) {
		try{
			$data = Session::get($data);
			if ($data == true) {
				return $profile="<a href='".URL."/user/index/' class='button'>Vaš profil</a>";
			} else {
				return $profile="<a href='".URL."/register/index/' class='button'>Registrujte se</a>";
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
	
	public function showcart($data) {
		try{
			$data = Session::get($data);
			if ($data == 3 || $data==null) {
				$cart=Session::get("cart");
				$numb=count($cart);
				if($cart){
					return $cart="<a href='".URL."/cart/index/' class='button3'>Korpa <span id='numb'>".$numb."</span></a>";
				}else{
					return $cart="<a href='".URL."/cart/index/' class='button3'>Korpa</a>";
				}
			} else {
				return $cart="<a href='".URL."/admin/index/' class='button'>Administracija</a>";
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
	
	public function showadd($data){
		try{
			$data=Session::get($data);
			$add=null;
			if($data == 3 || $data == null){
				return $add="DODAJ U KORPU";
			}else if ($data == 2 || $data == 1){
				return $add="ADMINISTRACIJA";
			}else{
				return $add=null;
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
	
	public function renderComment(){
		try{
			Session::start();
			$phone_id=Session::get("phone_id");
			$comments=Comments::GetAll("comments.id, comments.comment, comments.date, comments.user_id, comments.phone_id, comments.status_id, users.first_name as username","JOIN users ON comments.user_id=users.id JOIN phones ON comments.phone_id=phones.id JOIN comment_status ON comments.status_id=comment_status.id WHERE comment_status.id=2 AND phones.stock > 0 AND comments.phone_id='{$phone_id}' ");
			if($comments===false){
				throw new Exception($comments);
				return $comments=false;
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
	
	public function renderInsertComment(){
		try{
			Session::start();
			if (isset($_POST["commentsubmit"])) {
				$privilege = Session::get("privilege_id");
				if($privilege==3){
					if(!empty($_POST["phonecomment"])){
						$insertcomment = filter_var($_POST['phonecomment'], FILTER_SANITIZE_STRING);
						$insertcomment = (new Validate)->securityFilter($insertcomment);
						if (strlen($insertcomment) > 2000){
							 return $insertcomment = "Uneli ste previše karaktera.";
						}
						$comment= new Comments();
						$comment->comment=$insertcomment;
						date_default_timezone_set("Europe/Belgrade");
						$comment->date=date("Y-m-j");
						$user_id=Session::get("user_id");
						$comment->user_id=$user_id;
						$phone_id=Session::get("phone_id");
						$comment->phone_id=$phone_id;
						$comment->status_id="1";
						$comment->Insert();
						return $comment="Poslali ste komentar.";
					}
					return $insertcomment="Niste uneli komentar!";
				}
				return $insertcomment="Morate biti prijavljeni da biste ostavili komentar!<br><br>  <a class='reg_r' id='cmn' href='" . URL . "/login/index/'>Prijavite se</a>"; 
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
	
	public function renderShowCart(){
		Session::start();
		$cart=Session::get("cart");
		$numb=count($cart);
		if($numb===1){
			return "<div id='numbcart'>".$numb." proizvod je u korpi</div>";
		}else if($numb>1){
			return "<div id='numbcart'>".$numb." proizvoda su u korpi";
		}else{
			return $numb=false;
		}
	}
	
}

?>