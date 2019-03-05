<?php

class Admin extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $log = "", $profile = "", $cart="",$privilege = "",$add = "",$favorites = "",  $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "", $stock="",$statusID="",$users = "", $comments="",$orders="" ,$singleOrder="") {

        require_once "../app/views/header/index.php";
        require_once "../app/views/sidebar/index.php";
        require_once "../app/views/" . $view . ".php";
        require_once "../app/views/footer/index.php";
    }

    public function index() {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        if ($privilege == 2) {
            $this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
        }else if($privilege == 1){
			 $this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		} else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }

    public function phones() {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $admin = $this->model("AdminModel");
        $editPhonesID = $admin->editPhones();
        $edit_token = $admin->generateEditToken();
        $single = $home->singleRender($editPhonesID);
        $backImage = $home->backImageRender($editPhonesID);
        $batteries = $home->renderAllBatteries();
        $screen_resolutions = $home->renderAllScreenResolutions();
        $screen_sizes = $home->renderAllScreenSizes();
        $back_cameras = $home->renderAllBackCameras();
        $front_cameras = $home->renderAllFrontCameras();
        $phone_status = $home->renderAllPhoneStatus();
        $editimg = $admin->editImages();
        if ($privilege == 2) {
            $this->view("admin/single/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart,$privilege,$add, $favorites, $editPhonesID, $edit_token, $single, $backImage, $batteries, $screen_resolutions, $screen_sizes, $back_cameras, $front_cameras, $phone_status, $editimg);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }
	

    public function insertPhone() {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $admin = $this->model("AdminModel");
        $batteries = $home->renderAllBatteries();
        $screen_resolutions = $home->renderAllScreenResolutions();
        $screen_sizes = $home->renderAllScreenSizes();
        $back_cameras = $home->renderAllBackCameras();
        $front_cameras = $home->renderAllFrontCameras();
        $phone_status = $home->renderAllPhoneStatus();
        $insertPhones = $admin->insertPhones();
        $insert_phonetoken = $admin->generateInsertPhoneToken();
        if ($privilege == 2) {
            $this->view("admin/insert/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart,$privilege, $add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries, $screen_resolutions, $screen_sizes, $back_cameras, $front_cameras, $phone_status, $editimg = "", $insertPhones, $insert_phonetoken);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }

    public function insertImage() {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $allphones = $home->renderAllPhonesImage();
        $admin = $this->model("AdminModel");
        $insertLogo = $admin->insertLogo();
        $insertfrontimg = $admin->insertFrontImage();
        $insertbackimg = $admin->insertBackImage();
        if ($privilege == 2) {
            $this->view("admin/images/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart, $privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones, $insertLogo, $insertfrontimg, $insertbackimg);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }
	
	public function insertStock($phone_id=""){
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $admin = $this->model("AdminModel");
		$stock=$admin->renderStock($phone_id);
		$statusID=PhoneStatus::GetAll();
		 if ($privilege == 2) {
            $this->view("admin/stock/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart, $privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones="", $insertLogo="", $insertfrontimg="", $insertbackimg="",$stock,$statusID);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
	}

    public function users() {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $admin = $this->model("UserModel");
        $users = $admin->renderUsers();
        if ($privilege == 2) {
            $this->view("admin/users/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart,  $privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "",$stock="", $statusID="",$users);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }
	public function profile($id) {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
        $admin = $this->model("UserModel");
        $users = $admin->renderUsers($id);
        if ($privilege == 2) {
            $this->view("admin/profile/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "",$stock="", $statusID="",$users);
        } else {
           $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
    }
   
	
	public function comments(){
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $favorites = $home->renderFavorites();
		$admin = $this->model("UserModel");
		$comments = $admin->renderComments();
		if ($privilege == 2) {
            $this->view("admin/comments/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "",$stock="", $statusID="",$users="", $comments);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
	}
	
	public function content($id){
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
        $favorites = $home->renderFavorites();
        $privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$admin = $this->model("UserModel");
		$comments = $admin->renderComments($id);
		if ($privilege == 2) {
            $this->view("admin/content/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add,$favorites, $editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "", $stock="",$statusID="",$users="", $comments);
        } else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
	}
	
	public function orders($order_status="",$order_id=""){
		$home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
		$log = $home->showlog("first_name");
		$profile = $home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$favorites = $home->renderFavorites();
		$admin = $this->model("AdminModel");
		$singleOrder=$admin->renderSingleOrder($order_status,$order_id);
		$orders=$admin->renderOrders($order_status);
		$cart=$home->showcart("privilege_id");
		if($privilege==2){
			$this->view("admin/orders/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites,$editPhonesID = "", $edit_token = "", $single = "", $backImage = "", $batteries = "", $screen_resolutions = "", $screen_sizes = "", $back_cameras = "", $front_cameras = "", $phone_status = "", $editimg = "", $insertPhones = "", $insert_phonetoken = "", $allphones = "", $insertLogo = "", $insertfrontimg = "", $insertbackimg = "",$stock="", $statusID="",$users="", $comments="",$orders,$singleOrder);
		}else {
            $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites);
        }
		
	}
	
	

}
?>

