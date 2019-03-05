<?php

class Home extends Controller {
	
    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $log="",$profile="",$cart="",$privilege="",$add="",$favorites = "",$allphones = "",$message="", $sidebar = "", $search = "", $single = "", $backImage = "",$edit_token="",$batteries="",$screen_resolutions="",$screen_sizes="",$back_cameras="",$front_cameras="",$phone_status="",$editimg="",$comments="",$insertcomment=""){
		 
        require_once "../app/views/header/index.php";
        require_once "../app/views/sidebar/index.php";
        require_once "../app/views/" . $view . ".php";
        require_once "../app/views/footer/index.php";
		
    }
	
    public function index($phone_id="") {
        $home=$this->model("HomeModel");
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$favorites=$home->renderFavorites();
		$carts=$this->model("CartModel");
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$cart=$home->showcart("privilege_id");
		if($phoneAdd=="ADMINISTRACIJA" && $privilege==1){
			 $this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else if($phoneAdd=="ADMINISTRACIJA" && $privilege==2){
			$this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else{
			$this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites);
		}
    }
    public function phones($phone_id="") {
        $home=$this->model("HomeModel");
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$allphones=$home->renderAllPhones();
		$carts=$this->model("CartModel");
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$cart=$home->showcart("privilege_id");
		if($phoneAdd=="ADMINISTRACIJA" && $privilege==1){
			 $this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else if($phoneAdd=="ADMINISTRACIJA" && $privilege==2){
			$this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else{
			$this->view("home/phone/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites="",$allphones);	
		}
		
    }
    public function links() {
        $home=$this->model("HomeModel");
		$file=(new Common)->renderSetCache($file="../app/views/home/links/index.html",$duration=10);
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$cart=$home->showcart("privilege_id");
        $this->view("home/links/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege);
		$cache=(new Common)->renderGetCache($file);
    }
    public function about_us() {
		$home=$this->model("HomeModel");
		$file=(new Common)->renderSetCache($file="../app/views/home/about_us/index.html",$duration=10);
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$cart=$home->showcart("privilege_id");
        $this->view("home/about_us/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege);
		$cache=(new Common)->renderGetCache($file);
    }
    public function contact() {
		$home=$this->model("HomeModel");
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$message=$home->renderMessage();
		$cart=$home->showcart("privilege_id");
        $this->view("home/contact/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add="",$favorites = "", $allphones = "",$message);
    }
	
    public function filter($phone_id="") {
		$home=$this->model("HomeModel");
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $sidebar=$home->sidebarRender();
		$carts=$this->model("CartModel");
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$cart=$home->showcart("privilege_id");
		if($phoneAdd=="ADMINISTRACIJA" && $privilege==1){
			 $this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else if($phoneAdd=="ADMINISTRACIJA" && $privilege==2){
			$this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else{
			 $this->view("sidebar/filter/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites = "", $allphones = "",$message="",$sidebar);
		}
		
    }

    public function single($id,$phone_id="") {
		$home=$this->model("HomeModel");
        $date=$home->sitedate();
		$brands=$home->renderAllBrands();
		$systems=$home->renderAllSystems();
		$rams=$home->renderAllRams();
		$ints=$home->renderAllInts();
		$sims=$home->renderAllSims();
		$colors=$home->renderAllColors();
		$log=$home->showlog("first_name");
		$profile=$home->showprofile("first_name");
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
        $single = $home->singleRender($id);
        $backImage = $home->backImageRender($id);
		$admin = $this->model("AdminModel");
		$edit_token = $admin->generateEditToken();
		$batteries=$home->renderAllBatteries();
		$screen_resolutions=$home->renderAllScreenResolutions();
		$screen_sizes=$home->renderAllScreenSizes();
		$back_cameras=$home->renderAllBackCameras();
		$front_cameras=$home->renderAllFrontCameras();
		$phone_status=$home->renderAllPhoneStatus();
		$comments=$home->renderComment();
		$insertcomment=$home->renderInsertComment();
		$carts=$this->model("CartModel");
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$cart=$home->showcart("privilege_id");
		if($phoneAdd=="ADMINISTRACIJA" && $privilege==1){
			 $this->view("superadmin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else if($phoneAdd=="ADMINISTRACIJA" && $privilege==2){
			$this->view("admin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile,$cart, $privilege,$add);
		}else if($privilege==2){
			$this->view("admin/single/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log, $profile,$cart,$privilege,$add,$favorites = "", $allphones = "",$message="", $sidebar = "", $search = "",$single, $backImage,$edit_token,$batteries,$screen_resolutions,$screen_sizes,$back_cameras,$front_cameras,$phone_status,$comments="");
		}else if($privilege==1){
			$this->view("superadmin/single/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log, $profile,$cart,$privilege,$add,$favorites = "", $allphones = "",$message="", $sidebar = "", $search = "",$single, $backImage);
		}else{
			$this->view("single/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log, $profile,$cart,$privilege,$add,$favorites = "", $allphones = "",$message="", $sidebar = "", $search = "",$single, $backImage,$edit_token="",$batteries="",$screen_resolutions="",$screen_sizes="",$back_cameras="",$front_cameras="",$phone_status="",$editimg="",$comments,$insertcomment);
		}
    }
	
	
	
	
}
?>