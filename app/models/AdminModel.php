<?php

class AdminModel {

    public function editPhones() {
		try{
			Session::start();
			$phoneID = Session::get("phone_id");
			if (isset($_POST["submit"])) {
				if (isset($_POST["token"])) {
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("edit", $token);
				} else {
					$whitelist = array("price", "stock", "brand", "model", "color", "system", "screen_resolution", "screen_size", "ram", "int", "sim", "battery", "front_cam", "back_cam", "dimensions", "weight", "date", "status", "link", "token", "submit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u formi izmene podataka telefona.");
							die("Hack-Attempt. Koristite samo prosledjena polja u formi");
						}
					}
				}
				if ($isValid) {
					$phone = Phones::GetOne($phoneID);
					if (!empty($_POST['model'])) {
						$model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);
						$model = (new Validate)->securityFilter($model);
						$phone->name = $model;
						$phone->Update();
					}
					if (!empty($_POST['price'])) {
						$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
						$price = (new Validate)->securityFilter($price);
						$phone->price = $price;
						$phone->Update();
					}
					if (!empty($_POST['stock'])) {
						$stock = $_POST['stock'];
						if (filter_var($stock, FILTER_VALIDATE_INT) === 0 || !filter_var($stock, FILTER_VALIDATE_INT) === false) {
							var_dump($stock);
							$stock = (new Validate)->securityFilter($stock);
							$phone->stock = $stock;
							$phone->Update();
						} 
					}
					if (!empty($_POST['brand'])) {
						$brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
						$brand = (new Validate)->securityFilter($brand);
						$brandID = Brands::GetOne($brand);
						$id = $brandID->id;
						$phone->brand_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['link'])) {
						$link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);
						$link = (new Validate)->securityFilter($link);
						if (strlen($link) < 255) {
							$brandID = Brands::GetAll("brands.id", "JOIN phones ON phones.brand_id=brands.id WHERE phones.id='{$phoneID}' LIMIT 1");
							foreach ($brandID as $brid) {
								$id = $brid->id;
							}
							$brand = Brands::GetOne($id);
							$brand->website = $link;
							$brand->Update();
						}
					}
					if (!empty($_POST['system'])) {
						$system = filter_var($_POST['system'], FILTER_SANITIZE_STRING);
						$system = (new Validate)->securityFilter($system);
						$systemID = Sysems::GetOne($system);
						$id = $systemID->id;
						$phone->system_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['color'])) {
						$color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
						$color = (new Validate)->securityFilter($color);
						$colorID = Colors::GetOne($color);
						$id = $colorID->id;
						$phone->color_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['screen_resolution'])) {
						$screen_resolution = filter_var($_POST['screen_resolution'], FILTER_SANITIZE_STRING);
						$screen_resolution = (new Validate)->securityFilter($screen_resolution);
						$screen_resolutionID = ScreenResolutions::GetOne($screen_resolution);
						$id = $screen_resolutionID->id;
						$phone->screen_resolution_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['screen_size'])) {
						$screen_size = filter_var($_POST['screen_size'], FILTER_SANITIZE_STRING);
						$screen_size = (new Validate)->securityFilter($screen_size);
						$screen_sizeID = ScreenSizes::GetOne($screen_size);
						$id = $screen_sizeID->id;
						$phone->screen_size_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['ram'])) {
						$ram = filter_var($_POST['ram'], FILTER_SANITIZE_STRING);
						$ram = (new Validate)->securityFilter($ram);
						$ramID = RamMemories::GetOne($ram);
						$id = $ramID->id;
						$phone->ram_memory_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['int'])) {
						$int = filter_var($_POST['int'], FILTER_SANITIZE_NUMBER_INT);
						$int = (new Validate)->securityFilter($int);
						$intID = InternalMemories::GetOne($int);
						$id = $intID->id;
						$phone->internal_memory_id = $id;
						$phone->Update();
					}

					if (!empty($_POST['sim'])) {
						$sim = filter_var($_POST['sim'], FILTER_SANITIZE_STRING);
						$sim = (new Validate)->securityFilter($sim);
						$simID = SimSlots::GetOne($sim);
						$id = $simID->id;
						$phone->sim_slot_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['battery'])) {
						$battery = filter_var($_POST['battery'], FILTER_SANITIZE_NUMBER_INT);
						$battery = (new Validate)->securityFilter($battery);
						$batteryID = Batteries::GetOne($battery);
						$id = $batteryID->id;
						$phone->battery_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['front_camera'])) {
						$front_camera = filter_var($_POST['front_camera'], FILTER_SANITIZE_STRING);
						$front_camera = (new Validate)->securityFilter($front_camera);
						$front_cameraID = FrontCameras::GetOne($front_camera);
						$id = $front_cameraID->id;
						$phone->front_camera_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['back_camera'])) {
						$back_camera = filter_var($_POST['back_camera'], FILTER_SANITIZE_STRING);
						$back_camera = (new Validate)->securityFilter($back_camera);
						$back_cameraID = BackCameras::GetOne($back_camera);
						$id = $back_cameraID->id;
						$phone->back_camera_id = $id;
						$phone->Update();
					}
					if (!empty($_POST['dimensions'])) {
						$dimensions = filter_var($_POST['dimensions'], FILTER_SANITIZE_STRING);
						$dimensions = (new Validate)->securityFilter($dimensions);
						if (preg_match("/^[0-9a-zA-Z ]{1,25}$/", $dimensions)) {
							$phone->dimensions = $dimensions;
							$phone->Update();
						}
					}
					if (!empty($_POST['weight'])) {
						$weight = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_INT);
						$weight = (new Validate)->securityFilter($weight);
						if (preg_match("/^[0-9]{1,5}$/", $weight)) {
							$phone->weight = $weight;
							$phone->Update();
						}
					}
					if (!empty($_POST['date'])) {
						$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
						$date = (new Validate)->securityFilter($date);
						date_default_timezone_set("Europe/Belgrade");
						$time = date(" H:i:s");
						$date.=$time;
						$phone->date = $date;
						$phone->Update();
					}
					if (!empty($_POST['phone_status'])) {
						$phone_status = filter_var($_POST['phone_status'], FILTER_SANITIZE_NUMBER_INT);
						$phone_status = (new Validate)->securityFilter($phone_status);
						$phone_statusID = PhoneStatus::GetOne($phone_status);
						$id = $phone_statusID->id;
						$phone->status_id = $id;
						$phone->Update();
					}
					return $phoneID;
				}
				return $phoneID;
			}
			return $phoneID;
		}catch(Exception $e){
			$message=$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function generateEditToken() {
		try{
			$token = (new Token)->generateToken("edit");
			if($token===false){
				throw new Exception($token);
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza tokena za izmenu: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function editImages() {
		try{
			Session::start();
			$phoneID = Session::get("phone_id");
			if ($phoneID) {
				$brand_nameObj = Brands::GetAll("brands.id,brands.name", "JOIN phones ON brands.id=phones.brand_id WHERE phones.id='{$phoneID}' ");
				foreach ($brand_nameObj as $brand) {
					$brand_id = $brand->id;
					$brand_name = $brand->name;
				}
				$brand_name = strtolower($brand_name);
				if (isset($_POST['submit_front'])) {
					if (!empty($_FILES["front_img"])) {
						$allowedExts = array("jpg", "jpeg", "gif", "png");
						$explodedArray = explode(".", $_FILES["front_img"]["name"]);
						$extension = end($explodedArray);
						if ((($_FILES["front_img"]["type"] == "image/gif") || ($_FILES["front_img"]["type"] == "image/jpeg") || ($_FILES["front_img"]["type"] == "image/png") || ($_FILES["front_img"]["type"] == "image/pjpeg")) && ($_FILES["front_img"]["size"] < 51200) && in_array($extension, $allowedExts)) {
							if ($_FILES["front_img"]["error"] > 0) {
								return $img = "Greška: " . $_FILES["front_img"]["error"] . "<br>";
							}
							$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["front_img"]["name"];
							move_uploaded_file($_FILES["front_img"]["tmp_name"], $filePath);
							$images = Images::GetOne($phoneID);
							if ($images->status_id == "1") {
								if (!empty($_POST['imgname'])) {
									$imgname = (new Validate)->securityFilter($_POST['imgname']);
									$images->name = $imgname;
									$images->Update();
								}
								if (!empty($_POST['imgdesc'])) {
									$imgdesc = (new Validate)->securityFilter($_POST['imgdesc']);
									$images->description = $imgdesc;
									$images->Update();
								}
								$images->path = PATH ."/img/" . $brand_name . "/" . $_FILES["front_img"]["name"];
								$images->status_id = "1";
								$images->Update();
								return $img = "Uspešno ste uneli sliku.";
							}
						} else {
							return $img = "Neispravna datoteka";
						}
					}
				}
				if (isset($_POST['submit_back'])) {
					if (!empty($_FILES["back_img"])) {
						$allowedExts = array("jpg", "jpeg", "gif", "png");
						$explodedArray = explode(".", $_FILES["back_img"]["name"]);
						$extension = end($explodedArray);
						if ((($_FILES["back_img"]["type"] == "image/gif") || ($_FILES["back_img"]["type"] == "image/jpeg") || ($_FILES["back_img"]["type"] == "image/png") || ($_FILES["back_img"]["type"] == "image/pjpeg")) && ($_FILES["back_img"]["size"] < 51200) && in_array($extension, $allowedExts)) {
							if ($_FILES["back_img"]["error"] > 0) {
								return $img = "Greška: " . $_FILES["back_img"]["error"] . "<br>";
							}
							$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["back_img"]["name"];
							move_uploaded_file($_FILES["back_img"]["tmp_name"], $filePath);
							$images = Images::GetOne($phoneID);
							if ($images->status_id == "2") {
								if (!empty($_POST['imgname'])) {
									$imgname = (new Validate)->securityFilter($_POST['imgname']);
									$images->name = $imgname;
									$images->Update();
								}
								if (!empty($_POST['imgdesc'])) {
									$imgdesc = (new Validate)->securityFilter($_POST['imgdesc']);
									$images->description = $imgdesc;
									$images->Update();
								}
								$images->path = PATH . "/img/" . $brand_name . "/" . $_FILES["back_img"]["name"];
								$images->status_id = "2";
								$images->Update();
								return $img = "Uspešno ste uneli sliku.";
							}
						} else {
							return $img = "Neispravna datoteka";
						}
					}
				}
				if (isset($_POST['submit_logo'])) {
					if (!empty($_FILES["logo"])) {
						$allowedExts = array("jpg", "jpeg", "gif", "png");
						$explodedArray = explode(".", $_FILES["logo"]["name"]);
						$extension = end($explodedArray);
						if ((($_FILES["logo"]["type"] == "image/gif") || ($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/png") || ($_FILES["logo"]["type"] == "image/pjpeg")) && ($_FILES["logo"]["size"] < 51200) && in_array($extension, $allowedExts)) {
							if ($_FILES["logo"]["error"] > 0) {
								return $img = "Greška: " . $_FILES["logo"]["error"] . "<br>";
							}
							if (file_exists(PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"])) {
								return $img = "Slika " . $_FILES["logo"]["name"] . " već postoji. ";
							} else {
								$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"];
								move_uploaded_file($_FILES["logo"]["tmp_name"], $filePath);
								$brand = Brands::GetOne($brand_id);
								$brand->logo = PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"];
								$brand->Update();
								return $brand = "Uspešno ste uneli sliku.";
							}
						} else {
							return $img = "Neispravna datoteka";
						}
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

    public function insertPhones() {
		try{
			Session::start();
			if (isset($_POST["submit"])) {
				if (isset($_POST["token"])) {
					$token = filter_var($_POST['token'], FILTER_SANITIZE_STRING);
					$token = (new Validate)->securityFilter($token);
					$isValid = (new Token)->verifyFormToken("insertphone", $token);
				} else {
					$whitelist = array("price", "stock", "brand", "model", "color", "system", "screen_resolution", "screen_size", "ram", "int", "sim", "battery", "front_cam", "back_cam", "dimensions", "weight", "date", "status", "link", "token", "submit");
					foreach ($_POST as $key => $item) {
						if (!in_array($key, $whitelist)) {
							$log = (new Token)->setLog("Nepoznati nazivi polja u formi unošenja telefona.");
							die("Hack-Attempt. Koristite samo prosledjena polja u formi");
						}
					}
				}
				if ($isValid) {
					if (!empty($_POST['model']) && !empty($_POST['price']) && !empty($_POST['stock']) && !empty($_POST['dimensions']) && !empty($_POST['weight']) && !empty($_POST['date'])) {
						$brand_name = null;
						if (!empty($_POST['brand']) && empty($_POST['brandsel'])) {
							$brand_name = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
							$brand_name = (new Validate)->securityFilter($brand_name);
							if (!preg_match("/^[0-9a-zA-Z ]{1,25}$/", $brand_name)) {
								return $insert = "Neispravan unos proizvođača.";
							}
						} else if (!empty($_POST['brandsel']) && empty($_POST['brand'])) {
							$brand_name = filter_var($_POST['brandsel'], FILTER_SANITIZE_STRING);
							$brand_name = (new Validate)->securityFilter($brand_name);
							if (!preg_match("/^[0-9a-zA-Z ]{1,25}$/", $brand_name)) {
								return $insert = "Neispravan unos proizvođača.";
							}
						} else {
							return $insert = "Niste uneli proizvođača.";
						}
						$link = null;
						if (!empty($_POST['link'])) {
							$link = filter_var($_POST['link'], FILTER_SANITIZE_STRING);
							$link = (new Validate)->securityFilter($link);
							if (strlen($link) > 255) {
								return $insert = "Neispravan unos website-a.";
							}
						} else if (!empty($_POST['linksel'])) {
							$link = filter_var($_POST['linksel'], FILTER_SANITIZE_STRING);
							$link = (new Validate)->securityFilter($link);
							if (strlen($link) > 255) {
								return $insert = "Neispravan unos website-a.";
							}
						} else {
							return $insert = "Niste uneli website.";
						}
						$brands = Brands::GetAll("*", "WHERE brands.name='{$brand_name}' AND brands.website='{$link}' LIMIT 1");
						if (!$brands) {
							$brand = new Brands();
							$brand->name = $brand_name;
							$brand->website = $link;
							$brand->Insert();
						}

						$system = null;
						if (!empty($_POST['system']) && empty($_POST['systemsel'])) {
							$system_name = filter_var($_POST['system'], FILTER_SANITIZE_STRING);
							$system_name = (new Validate)->securityFilter($system_name);
							if (!preg_match("/^[0-9a-zA-Z ]{1,20}$/", $system_name)) {
								return $insert = "Neispravan unos operativnog sistema.";
							}
						} else if (!empty($_POST['systemsel']) && empty($_POST['system'])) {
							$system_name = filter_var($_POST['systemsel'], FILTER_SANITIZE_STRING);
							$system_name = (new Validate)->securityFilter($system_name);
							if (!preg_match("/^[0-9a-zA-Z ]{1,20}$/", $system_name)) {
								return $insert = "Neispravan unos dimenzije.";
							}
						} else {
							return $insert = "Niste uneli operativni sistem.";
						}
						$systems = Systems::GetAll("*", "WHERE systems.name='{$system_name}' LIMIT 1");
						if (!$systems) {
							$system = new Systems();
							$system->name = $system_name;
							$system->Insert();
						}

						$color = null;
						if (!empty($_POST['color']) && empty($_POST['colorsel'])) {
							$color_name = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
							$color_name = (new Validate)->securityFilter($color_name);
							if (strlen($color_name) > 25) {
								return $insert = "Neispravan unos boje.";
							}
						} else if (!empty($_POST['colorsel']) && empty($_POST['color'])) {
							$color_name = filter_var($_POST['colorsel'], FILTER_SANITIZE_STRING);
							$color_name = (new Validate)->securityFilter($color_name);
							if (strlen($color_name) > 25) {
								return $insert = "Neispravan unos boje.";
							}
						} else {
							return $insert = "Niste uneli boju telefona.";
						}

						$colors = Colors::GetAll("*", "WHERE colors.name='{$color_name}' LIMIT 1");
						if (!$colors) {
							$color = new Colors();
							$color->name = $color_name;
							$color->Insert();
						}

						$screen_resolution = null;
						if (!empty($_POST['screen_resolution']) && empty($_POST['screen_resolutionsel'])) {
							$screen_resolution = filter_var($_POST['screen_resolution'], FILTER_SANITIZE_STRING);
							$screen_resolution = (new Validate)->securityFilter($screen_resolution);
							if (!preg_match("/^[0-9a-zA-Z., ]{1,14}$/", $screen_resolution)) {
								return $insert = "Neispravan unos rezolucije ekrana.";
							}
						} else if (!empty($_POST['screen_resolutionsel']) && empty($_POST['screen_resolution'])) {
							$screen_resolution = filter_var($_POST['screen_resolutionsel'], FILTER_SANITIZE_STRING);
							$screen_resolution = (new Validate)->securityFilter($screen_resolution);
							if (!preg_match("/^[0-9a-zA-Z., ]{1,14}$/", $screen_resolution)) {
								return $insert = "Neispravan unos rezolucije ekrana.";
							}
						} else {
							return $insert = "Niste uneli rezoluciju ekrana.";
						}
						$screen_resolutions = ScreenResolutions::GetAll("*", "WHERE screen_resolutions.resolution='{$screen_resolution}' LIMIT 1");
						if (!$screen_resolutions) {
							$resolutions = new ScreenResolutions();
							$resolutions->resolution = $screen_resolution;
							$resolutions->Insert();
						}

						$screen_size = null;
						if (!empty($_POST['screen_size']) && empty($_POST['screen_sizesel'])) {
							$screen_size = filter_var($_POST['screen_size'], FILTER_SANITIZE_STRING);
							$screen_size = (new Validate)->securityFilter($screen_size);
							if (strlen($screen_size) > 3) {
								return $insert = "Neispravan unos veličine ekrana.";
							}
						} else if (!empty($_POST['screen_sizesel']) && empty($_POST['screen_size'])) {
							$screen_size = filter_var($_POST['screen_sizesel'], FILTER_SANITIZE_STRING);
							$screen_size = (new Validate)->securityFilter($screen_size);
							if (strlen($screen_size) > 3) {
								return $insert = "Neispravan unos veličine ekrana.";
							}
						} else {
							return $insert = "Niste uneli veličinu ekrana.";
						}
						$screen_sizes = ScreenSizes::GetAll("*", "WHERE screen_sizes.size='{$screen_size}' LIMIT 1");
						if (!$screen_sizes) {
							$sizes = new ScreenSizes();
							$sizes->size = $screen_size;
							$sizes->Insert();
						}


						$ram = null;
						if (!empty($_POST['ram']) && empty($_POST['ramsel'])) {
							$ram = filter_var($_POST['ram'], FILTER_SANITIZE_STRING);
							$ram = (new Validate)->securityFilter($ram);
							if (strlen($ram) > 4) {
								return $insert = "Neispravan unos ram memorije.";
							}
						} else if (!empty($_POST['ramsel']) && empty($_POST['ram'])) {
							$ram = filter_var($_POST['ramsel'], FILTER_SANITIZE_STRING);
							$ram = (new Validate)->securityFilter($ram);
							if (strlen($ram) > 4) {
								return $insert = "Neispravan unos ram memorije.";
							}
						} else {
							return $insert = "Niste uneli RAM memoriju.";
						}
						$rams = RamMemories::GetAll("*", "WHERE ram_memories.name='{$ram}' LIMIT 1");
						if (!$rams) {
							$ram_memory = new RamMemories();
							$ram_memory->name = $ram;
							$ram_memory->Insert();
						}


						$int = null;
						if (!empty($_POST['int']) && empty($_POST['intsel'])) {
							$int = filter_var($_POST['int'], FILTER_SANITIZE_NUMBER_INT);
							$int = (new Validate)->securityFilter($int);
							if (!preg_match("/^[0-9a-zA-Z., ]{0,4}$/", $int)) {
								return $insert = "Neispravan unos interne memorije.";
							}
						} else if (!empty($_POST['intsel']) && empty($_POST['int'])) {
							$int = filter_var($_POST['intsel'], FILTER_SANITIZE_NUMBER_INT);
							$int = (new Validate)->securityFilter($int);
							if (!preg_match("/^[0-9a-zA-Z., ]{0,4}$/", $int)) {
								return $insert = "Neispravan unos interne memorije.";
							}
						} else {
							return $insert = "Niste uneli internu memoriju.";
						}
						$ints = InternalMemories::GetAll("*", "WHERE internal_memories.name='{$int}' LIMIT 1");
						if (!$ints) {
							$int_memory = new InternalMemories();
							$int_memory->name = $int;
							$int_memory->Insert();
						}


						$sim = null;
						if (!empty($_POST['sim']) && empty($_POST['simsel'])) {
							$sim = filter_var($_POST['sim'], FILTER_SANITIZE_STRING);
							$sim = (new Validate)->securityFilter($sim);
							if (!preg_match("/^[0-9a-zA-Z ]{1,20}$/", $sim)) {
								return $insert = "Neispravan unos SIM Slot-a.";
							}
						} else if (!empty($_POST['simsel']) && empty($_POST['sim'])) {
							$sim = filter_var($_POST['simsel'], FILTER_SANITIZE_STRING);
							$sim = (new Validate)->securityFilter($sim);
							if (!preg_match("/^[0-9a-zA-Z ]{1,20}$/", $sim)) {
								return $insert = "Neispravan unos SIM Slot-a.";
							}
						} else {
							return $insert = "Niste uneli prednju SIM Slot.";
						}
						$sims = SimSlots::GetAll("*", "WHERE sim_slots.name='{$sim}' LIMIT 1");
						if (!$sims) {
							$slots = new SimSlots();
							$slots->name = $sim;
							$slots->Insert();
						}


						$battery = null;
						if (!empty($_POST['battery']) && empty($_POST['batterysel'])) {
							$battery = filter_var($_POST['battery'], FILTER_SANITIZE_NUMBER_INT);
							$battery = (new Validate)->securityFilter($battery);
							if (!preg_match("/^[0-9a-zA-Z ]{0,5}$/", $battery)) {
								return $insert = "Neispravan unos baterije.";
							}
						} else if (!empty($_POST['batterysel']) && empty($_POST['battery'])) {
							$battery = filter_var($_POST['batterysel'], FILTER_SANITIZE_NUMBER_INT);
							$battery = (new Validate)->securityFilter($battery);
							if (!preg_match("/^[0-9a-zA-Z ]{0,5}$/", $battery)) {
								return $insert = "Neispravan unos baterije.";
							}
						} else {
							return $insert = "Niste uneli prednju bateriju.";
						}
						$batteries = Batteries::GetAll("*", "WHERE batteries.name='{$battery}' LIMIT 1");
						if (!$batteries) {
							$batt = new Batteries();
							$batt->name = $battery;
							$batt->Insert();
						}


						$front_camera = null;
						if (!empty($_POST['front_cam']) && empty($_POST['front_camerasel'])) {
							$front_camera = filter_var($_POST['front_cam'], FILTER_SANITIZE_STRING);
							$front_camera = (new Validate)->securityFilter($front_camera);
							if (strlen($front_camera) > 5) {
								return $insert = "Neispravan unos prednje kamere.";
							}
						} else if (!empty($_POST['front_camerasel']) && empty($_POST['front_cam'])) {
							$front_camera = filter_var($_POST['front_camerasel'], FILTER_SANITIZE_STRING);
							$front_camera = (new Validate)->securityFilter($front_camera);
							if (strlen($front_camera) > 5) {
								return $insert = "Neispravan unos prednje kamere.";
							}
						} else {
							return $insert = "Niste uneli prednju kameru.";
						}
						$front_cameras = FrontCameras::GetAll("*", "WHERE front_cameras.name='{$front_camera}' LIMIT 1");
						if (!$front_cameras) {
							$fcameras = new FrontCameras();
							$fcameras->name = $front_camera;
							$fcameras->Insert();
						}


						$back_camera = null;
						if (!empty($_POST['back_cam']) && empty($_POST['back_camerasel'])) {
							$back_camera = filter_var($_POST['back_cam'], FILTER_SANITIZE_STRING);
							$back_camera = (new Validate)->securityFilter($back_camera);
							if (strlen($back_camera) > 5) {
								return $insert = "Neispravan unos zadnje kamere.";
							}
						} else if (!empty($_POST['back_camerasel']) && empty($_POST['back_cam'])) {
							$back_camera = filter_var($_POST['back_camerasel'], FILTER_SANITIZE_STRING);
							$back_camera = (new Validate)->securityFilter($back_camera);
							if (strlen($back_camera) > 5) {
								return $insert = "Neispravan unos zadnje kamere.";
							}
						} else {
							return $insert = "Niste uneli zadnju kameru.";
						}
						$back_cameras = BackCameras::GetAll("*", "WHERE back_cameras.name='{$back_camera}' LIMIT 1");
						if (!$back_cameras) {
							$bcameras = new BackCameras();
							$bcameras->name = $back_camera;
							$bcameras->Insert();
						}
						$phone_status = null;
						if (!empty($_POST['phone_status'])) {
							$phone_status = filter_var($_POST['phone_status'], FILTER_SANITIZE_NUMBER_INT);
							$phone_status = (new Validate)->securityFilter($phone_status);
						} else {
							return $insert = "Niste uneli status telefona.";
						}

						$model = null;
						if (!empty($_POST['model'])) {
							$model = filter_var($_POST['model'], FILTER_SANITIZE_STRING);
							$model = (new Validate)->securityFilter($model);
							if (!preg_match("/^[0-9a-zA-Z ]{1,30}$/", $model)) {
								return $insert = "Neispravan unos modela.";
							}
						} else {
							return $insert = "Niste uneli model.";
						}

						$price = null;
						if (!empty($_POST['price'])) {
							$price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
							$price = (new Validate)->securityFilter($price);
							if (strlen($back_camera) > 7) {
								return $insert = "Neispravan unos cene.";
							}
						} else {
							return $insert = "Niste uneli cenu.";
						}


						$stock = null;
						if (!empty($_POST['stock'])) {
							$stock = filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT);
							$stock = (new Validate)->securityFilter($stock);
							if (!preg_match("/^[0-9]{0,5}$/", $stock)) {
								return $insert = "Neispravan unos količine.";
							}
						} else {
							return $insert = "Niste uneli količinu.";
						}

						$dimensions = null;
						if (!empty($_POST['dimensions'])) {
							$dimensions = filter_var($_POST['dimensions'], FILTER_SANITIZE_STRING);
							$dimensions = (new Validate)->securityFilter($dimensions);
							if (!preg_match("/^[0-9a-zA-Z ]{10,25}$/", $dimensions)) {
								return $insert = "Neispravan unos dimenzije.";
							}
						} else {
							return $insert = "Niste uneli dimenzije.";
						}

						$weight = null;
						if (!empty($_POST['weight'])) {
							$weight = filter_var($_POST['weight'], FILTER_SANITIZE_NUMBER_INT);
							$weight = (new Validate)->securityFilter($weight);
							if (!preg_match("/^[0-9]{0,5}$/", $weight)) {
								return $insert = "Neispravan unos mase.";
							}
						} else {
							return $insert = "Niste uneli masu.";
						}

						$date = null;
						if (!empty($_POST['date'])) {
							$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
							$date = (new Validate)->securityFilter($date);
							date_default_timezone_set("Europe/Belgrade");
							$time = date(" H:i:s");
							$date.=$time;
						}
						$brand = Brands::GetAll("brands.id", "WHERE brands.name='{$brand_name}'");
						foreach ($brand as $id) {
							$brand_id = $id->id;
						}
						$system = Systems::GetAll("systems.id", "WHERE systems.name='{$system_name}'");
						foreach ($system as $id) {
							$system_id = $id->id;
						}
						$color = Colors::GetAll("colors.id", "WHERE colors.name='{$color_name}'");
						foreach ($color as $id) {
							$color_id = $id->id;
						}
						$screen_resolution = ScreenResolutions::GetAll("screen_resolutions.id", "WHERE screen_resolutions.resolution='{$screen_resolution}'");
						foreach ($screen_resolution as $id) {
							$screen_resolution_id = $id->id;
						}
						$screen_size = ScreenSizes::GetAll("screen_sizes.id", "WHERE screen_sizes.size='{$screen_size}'");
						foreach ($screen_size as $id) {
							$screen_size_id = $id->id;
						}
						$ram = RamMemories::GetAll("ram_memories.id", "WHERE ram_memories.name='{$ram}'");
						foreach ($ram as $id) {
							$ram_id = $id->id;
						}
						$int = InternalMemories::GetAll("internal_memories.id", "WHERE internal_memories.name='{$int}'");
						foreach ($int as $id) {
							$int_id = $id->id;
						}
						$sim = SimSlots::GetAll("sim_slots.id", "WHERE sim_slots.name='{$sim}'");
						foreach ($sim as $id) {
							$sim_id = $id->id;
						}
						$battery = Batteries::GetAll("batteries.id", "WHERE batteries.name='{$battery}'");
						foreach ($battery as $id) {
							$battery_id = $id->id;
						}
						$front_camera = FrontCameras::GetAll("front_cameras.id", "WHERE front_cameras.name='{$front_camera}'");
						foreach ($front_camera as $id) {
							$front_camera_id = $id->id;
						}
						$back_camera = BackCameras::GetAll("back_cameras.id", "WHERE back_cameras.name='{$back_camera}'");
						foreach ($back_camera as $id) {
							$back_camera_id = $id->id;
						}

						$phone = new Phones();
						$phone->name = $model;
						$phone->price = $price;
						$phone->stock = $stock;
						$phone->dimensions = $dimensions;
						$phone->weight = $weight;
						$phone->date = $date;
						$phone->brand_id = $brand_id;
						$phone->color_id = $color_id;
						$phone->system_id = $system_id;
						$phone->screen_resolution_id = $screen_resolution_id;
						$phone->battery_id = $battery_id;
						$phone->sim_slot_id = $sim_id;
						$phone->screen_size_id = $screen_size_id;
						$phone->ram_memory_id = $ram_id;
						$phone->internal_memory_id = $int_id;
						$phone->front_camera_id = $front_camera_id;
						$phone->back_camera_id = $back_camera_id;
						$phone->status_id = $phone_status;
						$phone->Insert();
						return $insert = "Uspešno ste uneli nov telefon";
					}
					return $insert = "Niste popunili sva polja.";
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

    public function generateInsertPhoneToken() {
		try{
			$token = (new Token)->generateToken("insertphone");
			if($token===false){
				throw new Exception($token);
			}else{
				return $token;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza tokena za unos telefona: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
    }

    public function insertLogo() {
		try{
			Session::start();
			if (isset($_POST['submit_logo'])) {
				$logo = null;
				if (!empty($_FILES["logo"]) && !empty($_POST["brandsel"])) {
					$brand_name = filter_var($_POST['brandsel'], FILTER_SANITIZE_STRING);
					$brand_name = (new Validate)->securityFilter($brand_name);
					$allowedExts = array("jpg", "jpeg", "gif", "png");
					$explodedArray = explode(".", $_FILES["logo"]["name"]);
					$extension = end($explodedArray);
					if ((($_FILES["logo"]["type"] == "image/gif") || ($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/png") || ($_FILES["logo"]["type"] == "image/pjpeg")) && ($_FILES["logo"]["size"] < 51200) && in_array($extension, $allowedExts)) {
						if ($_FILES["logo"]["error"] > 0) {
							return $insert = "Greška kod unosa slike: " . $_FILES["logo"]["error"] . "<br>";
						}
						if (!file_exists(PATH . "/img/" . $brand_name . "")) {
							mkdir(PATH . "/img/" . $brand_name . "", 0777, true);
						}
						if (file_exists(PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"])) {
							return $insert = "Logo " . $_FILES["logo"]["name"] . " već postoji. ";
						} else {
							$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"];
							move_uploaded_file($_FILES["logo"]["tmp_name"], $filePath);

							$logopath = PATH . "/img/" . $brand_name . "/" . $_FILES["logo"]["name"];
							$brands = Brands::GetAll("brands.id", "WHERE brands.name='{$brand_name}' LIMIT 1");
							foreach ($brands as $id) {
								$brand_id = $id->id;
							}
							$brand = Brands::GetOne($brand_id);
							$brand->logo = $logopath;
							$brand->Update();

							return $insert = "Uspešno ste uneli logo";
						}
					} else {
						return $insert = "Neispravna datoteka";
					}
				}
				return $insert = "Niste uneli naziv proizvođača i logo";
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

    public function insertFrontImage() {
		try{
			Session::start();
			if (isset($_POST['submit_front'])) {
				$frontimage = null;
				if (!empty($_FILES["front_img"]) && !empty($_POST["modelselfront"]) && !empty($_POST["imgname"]) && !empty($_POST["imgdesc"])) {
					$model = filter_var($_POST['modelselfront'], FILTER_SANITIZE_STRING);
					$model = (new Validate)->securityFilter($model);
					$imgname = filter_var($_POST['imgname'], FILTER_SANITIZE_STRING);
					$imgname = (new Validate)->securityFilter($imgname);
					if (strlen($imgname) > 256) {
						return $insert = "Neispravan unos naziva slike.";
					}
					$imgdesc = filter_var($_POST['imgdesc'], FILTER_SANITIZE_STRING);
					$imgdesc = (new Validate)->securityFilter($imgdesc);
					if (strlen($imgdesc) > 1024) {
						return $insert = "Neispravan unos opisa slike.";
					}
					$allowedExts = array("jpg", "jpeg", "gif", "png");
					$explodedArray = explode(".", $_FILES["front_img"]["name"]);
					$extension = end($explodedArray);
					if ((($_FILES["front_img"]["type"] == "image/gif") || ($_FILES["front_img"]["type"] == "image/jpeg") || ($_FILES["front_img"]["type"] == "image/png") || ($_FILES["front_img"]["type"] == "image/pjpeg")) && ($_FILES["front_img"]["size"] < 51200) && in_array($extension, $allowedExts)) {

						if ($_FILES["front_img"]["error"] > 0) {
							return $insert = "Greška kod unosa slike: " . $_FILES["front_img"]["error"] . "<br>";
						}
						$phone = Phones::GetAll("brands.name as brand_name, phones.id as phone_id", "JOIN brands ON brands.id=phones.brand_id WHERE phones.id='{$model}'");
						foreach ($phone as $data) {
							$brand_name = $data->brand_name;
							$phone_id = $data->phone_id;
						}
						$brand_name = strtolower($brand_name);
						if (!file_exists(PATH . "/img/" . $brand_name . "")) {
							mkdir(PATH . "/img/" . $brand_name . "", 0777, true);
						}
						if (file_exists(PATH . "/img/" . $brand_name . "/" . $_FILES["front_img"]["name"])) {
							return $insert = "Slika " . $_FILES["front_img"]["name"] . " već postoji. ";
						} else {
							$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["front_img"]["name"];
							move_uploaded_file($_FILES["front_img"]["tmp_name"], $filePath);

							$frontimagepath = PATH . "/img/" . $brand_name . "/" . $_FILES["front_img"]["name"];
							$image = new Images();
							$image->name = $imgname;
							$image->description = $imgdesc;
							$image->path = $frontimagepath;
							$image->phone_id = $phone_id;
							$image->status_id = "1";
							$image->Insert();

							return $insert = "Uspešno ste uneli sliku.";
						}
					} else {
						return $insert = "Neispravna datoteka.";
					}
				}
				return $insert = "Niste uneli sliku.";
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

    public function insertBackImage() {
		try{
			Session::start();
			if (isset($_POST['submit_back'])) {
				$backimage = null;
				if (!empty($_FILES["back_img"]) && !empty($_POST["modelselback"]) && !empty($_POST["imgname"]) && !empty($_POST["imgdesc"])) {
					$model = filter_var($_POST['modelselback'], FILTER_SANITIZE_STRING);
					$model = (new Validate)->securityFilter($model);
					$imgname = filter_var($_POST['imgname'], FILTER_SANITIZE_STRING);
					$imgname = (new Validate)->securityFilter($imgname);
					if (strlen($imgname) > 256) {
						return $insert = "Neispravan unos naziva slike.";
					}
					$imgdesc = filter_var($_POST['imgdesc'], FILTER_SANITIZE_STRING);
					$imgdesc = (new Validate)->securityFilter($imgdesc);
					if (strlen($imgdesc) > 1024) {
						return $insert = "Neispravan unos opisa slike.";
					}
					$allowedExts = array("jpg", "jpeg", "gif", "png");
					$explodedArray = explode(".", $_FILES["back_img"]["name"]);
					$extension = end($explodedArray);
					if ((($_FILES["back_img"]["type"] == "image/gif") || ($_FILES["back_img"]["type"] == "image/jpeg") || ($_FILES["back_img"]["type"] == "image/png") || ($_FILES["back_img"]["type"] == "image/pjpeg")) && ($_FILES["back_img"]["size"] < 51200) && in_array($extension, $allowedExts)) {

						if ($_FILES["back_img"]["error"] > 0) {
							return $insert = "Greška kod unosa slike: " . $_FILES["back_img"]["error"] . "<br>";
						}
						$phone = Phones::GetAll("brands.name as brand_name, phones.id as phone_id", "JOIN brands ON brands.id=phones.brand_id WHERE phones.id='{$model}'");
						foreach ($phone as $data) {
							$brand_name = $data->brand_name;
							$phone_id = $data->phone_id;
						}
						$brand_name = strtolower($brand_name);
						if (!file_exists(PATH . "/img/" . $brand_name . "")) {
							mkdir(PATH . "/img/" . $brand_name . "", 0777, true);
						}
						if (file_exists(PATH . "/img/" . $brand_name . "/" . $_FILES["back_img"]["name"])) {
							return $insert = "Slika " . $_FILES["back_img"]["name"] . " već postoji. ";
						} else {
							$filePath = PATH . "/img/" . $brand_name . "/" . $_FILES["back_img"]["name"];
							move_uploaded_file($_FILES["back_img"]["tmp_name"], $filePath);

							$frontimagepath = PATH . "/img/" . $brand_name . "/" . $_FILES["back_img"]["name"];
							$image = new Images();
							$image->name = $imgname;
							$image->description = $imgdesc;
							$image->path = $frontimagepath;
							$image->phone_id = $phone_id;
							$image->status_id = "2";
							$image->Insert();

							return $insert = "Uspešno ste uneli sliku.";
						}
					} else {
						return $insert = "Neispravna datoteka.";
					}
				}
				return $insert = "Niste uneli sliku.";
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
	
	public function renderOrders($order_status=""){
		try{
			Session::start();
			$order_status = filter_var($order_status, FILTER_SANITIZE_NUMBER_INT);
			$order_status = (new Validate)->securityFilter($order_status);
			$orderstatus=OrderStatus::GetAll();
			if(is_numeric($order_status)<=count($orderstatus)){
				$q1="orders.id as order_id,orders.date as order_date,orders.status_id,order_status.name as order_status_name";
				$q2="JOIN order_status ON orders.status_id=order_status.id ";
				if(!$order_status){
					$q2.=" ORDER BY order_date DESC ";
					$orders=Orders::GetAll($q1,$q2);
					return $orders;
				}else{
					$q2.="WHERE orders.status_id='{$order_status}' ORDER BY order_date DESC ";
					$orders=Orders::GetAll($q1,$q2);
					return $orders;
				}
			}else{
				return $orders=false;
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
	
	public function renderSingleOrder($order_status,$order_id){
		try{
			Session::start();
			if(isset($_POST['order']) || $order_status && $order_id){
				if(!empty($_POST['orderID'])){
					$order_id = filter_var($_POST['orderID'], FILTER_SANITIZE_NUMBER_INT);
					$order_id = (new Validate)->securityFilter($order_id);
				}else{
					$order_status = filter_var($order_status, FILTER_SANITIZE_NUMBER_INT);
					$order_status = (new Validate)->securityFilter($order_status);
					$order_id = filter_var($order_id, FILTER_SANITIZE_NUMBER_INT);
					$order_id = (new Validate)->securityFilter($order_id);
					$order=Orders::GetOne($order_id);
					$order->status_id=$order_status;
					$order->Update();
				}
				$orders=Orders::GetAll();
				
				foreach($orders as $or_id){
					$array[]=$or_id->id;
				}
				if(in_array($order_id,$array)){
					$order=Orders::GetAll("orders.id as order_id, orders.quantity as order_quantity, orders.price as order_price, orders.total as order_total, orders.date as order_date,orders.ip as order_ip, orders.user_id as user_id, users.first_name as user_first_name, users.last_name as user_last_name,orders.phone_id as phone_id, orders.status_id,phones.name as phone_name, order_status.name as order_status_name, users.id as user_id, users.first_name as user_first_name, users.last_name as user_last_name, users.email as user_email, users.phone_number as user_phone_number,  users.address as user_address, users.city as user_city, users.postal_code as user_postal_code, users.status_id, user_status.name as user_status_name","JOIN phones ON orders.phone_id=phones.id JOIN order_status ON orders.status_id=order_status.id JOIN users ON orders.user_id=users.id JOIN user_status ON user_status.id=users.status_id WHERE orders.id='{$order_id}' LIMIT 1");
					if($order_status==3 ){
						try{
							foreach($order as $data){
								$email=$data->user_email;
								$first_name=$data->user_first_name;
								$last_name=$data->user_last_name;
								$phone_name=$data->phone_name;
								$order_quantity=$data->order_quantity;
								$order_price=$data->order_price;
								$order_total=$data->order_total;
								$user_address=$data->user_address;
								$user_postal_code=$data->user_postal_code;
								$user_city=$data->user_city;
								$user_phone_number=$data->user_phone_number;
							}
							$subject="MobITA narudžbenica!";
							$order_price = number_format($order_price, 3); 
							$order_total = number_format($order_total, 3); 
							$message="Poštovani ". $first_name . " " . $last_name . ",\r\nNaručili ste preko našeg sajta mobilni telefon:\r\n" . $phone_name . "\r\n" . $order_quantity . " kom po ceni: " . $order_price . " dinara\r\nUkupno: " . $order_total . " dinara\r\n\r\nTelefon će Vam biti isporučen na adresu: " . $user_address . ", " . $user_postal_code . " " . $user_city . ".\r\nBićete kontaktirani za potvrdu narudžbenice na telefon " . $user_phone_number . ".\r\nHvala na poverenju.";
							$from_name="MobITA";
							$from_email=ADMIN;
							$send=(new Common)->sendEmail($email,$subject,$message,$from_name,$from_email);
						}catch(Exception $e){
							$message="Greška kod slanja emaila prilikom prihvatanja narudžbenice: ".$e->getMessage();
							$code=$e->getCode();
							$file=$e->getFile();
							$line=$e->getLine();
							$trace_as_string=$e->getTraceAsString();
							$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
						}
					}
					return $order;
				}else{
					return $order=false;
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
	
	public function renderStock($phone_id=""){
		try{
			Session::start();
			if(isset($_POST['addstock'])){
				if(!empty($phone_id)){
					$phone_id = filter_var($phone_id, FILTER_SANITIZE_NUMBER_INT);
					$phone_id = (new Validate)->securityFilter($phone_id);
					$phone=Phones::GetOne($phone_id);
					if($phone){
						if(isset($_POST['stock'])){
							$stock = (new Validate)->securityFilter($_POST['stock']);
							$stock = filter_var($stock, FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>99999)));
							if($stock==true || $stock===0){
								$phone->stock=$stock;
								$phone->Update();
							}
						}
						if(isset($_POST['phone_status'])){
							$phone_status = filter_var($_POST['phone_status'], FILTER_SANITIZE_NUMBER_INT);
							$phone_status = (new Validate)->securityFilter($phone_status);
							$phone->status_id=$phone_status;
							$phone->Update();
						}			
					}
				}
			}
			$q1="phones.id as phone_id, phones.name as phone_name, phones.price as phone_price, phones.stock as phone_stock, phone_status.name as status_name";
			$q2="JOIN phone_status ON phones.status_id=phone_status.id ";
			if(isset($_POST['yostock'])){
				try{
					$q2.=" WHERE phones.stock > 0  AND phones.status_id=1 ORDER BY phones.stock ASC ";
					$phones=Phones::GetAll($q1,$q2);
					if($phones===false){
						throw new Exception($phones);
					}else{
						return $phones;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza telefona na stanju: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}
			if(isset($_POST['nostock'])){
				try{
					$q2.=" WHERE phones.stock = 0 AND phones.status_id=1 ORDER BY phones.stock ASC ";
					$phones=Phones::GetAll($q1,$q2);
					if($phones===false){
						throw new Exception($phones);
					}else{
						return $phones;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza telefona koji nisu na stanju: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}
			if(isset($_POST['current'])){
				try{
					$q2.=" WHERE phones.status_id = 1 ORDER BY phones.name ASC ";
					$phones=Phones::GetAll($q1,$q2);
					if($phones===false){
						throw new Exception($phones);
					}else{
						return $phones;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza aktuelnih telefona: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}
			if(isset($_POST['outdated'])){
				try{
					$q2.=" WHERE phones.status_id = 2 ORDER BY phones.name ASC ";
					$phones=Phones::GetAll($q1,$q2);
					if($phones===false){
						throw new Exception($phones);
					}else{
						return $phones;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza zastarelih telefona: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}
			}
			$q2.=" ORDER BY phones.stock ASC ";
			$phones=Phones::GetAll($q1,$q2);
			return $phones;
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