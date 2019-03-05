<?php

class Superadmin extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $log = "", $profile = "",$cart="",$privilege="",$add="",$favorites="",$admins="",$errors="",$errcontent="",$errdelete="",$showlog="") {

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
		$favorites=$home->renderFavorites();
		$supadm=$this->model("SuperadminModel");
		$admins=$supadm->renderAdmin();
		if($privilege==1){
			$this->view("superadmin/user/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log,$profile, $cart,$privilege,$add,$favorites="",$admins);
		}else{
			$this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites);
		}
        
    }
	public function profile($id="") {
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
		$favorites=$home->renderFavorites();
		$supadm=$this->model("SuperadminModel");
		$admins=$supadm->renderAdmin($id);
		if($privilege==1){
			$this->view("superadmin/profile/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log,$profile, $cart,$privilege,$add,$favorites="",$admins);
		}else{
			$this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites);
		}
    }
	
	public function errors($id="") {
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
		$favorites=$home->renderFavorites();
		$err=$this->model("SuperadminModel");
		$errcontent=$err->renderErrContent($id);
		$errdelete=$err->renderErrDelete($id);
		$errors=$err->renderErrors();
		if($privilege==1){
			$this->view("superadmin/error/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add,$favorites="",$admins="",$errors,$errcontent,$errdelete);
		}else{
			$this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites);
		}
        
    }
	
	public function logs() {
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
		$favorites=$home->renderFavorites();
		$err=$this->model("SuperadminModel");
		$showlog=$err->renderShowLog();
		if($privilege==1){
			echo $showlog;
		}else{
			$this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$log,$profile,$cart,$privilege,$add,$favorites);
		}
		 
		
	}

}

?>