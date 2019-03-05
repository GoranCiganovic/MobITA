<?php

class Login extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $log = "", $profile = "",$cart="",$privilege="",$add="", $favorites = "", $login = "", $log_token = "", $forgotten = "", $for_token = "", $activate = "") {

        require_once "../app/views/header/index.php";
        require_once "../app/views/sidebar/index.php";
        require_once "../app/views/" . $view . ".php";
        require_once "../app/views/footer/index.php";
    }

    public function index() {
		$file=(new Common)->renderDelCache("links/index.html");
		$file=(new Common)->renderDelCache("about_us/index.html");
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
        $logmod = $this->model("LoginModel");
        $login = $logmod->loginRender();
        $log_token = $logmod->generateLoginToken();
        $this->view("login/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add="",$favorites = "", $login, $log_token);
    }

    public function logout() {
		Session::destroy();
		$file=(new Common)->renderDelCache("links/index.html");
		$file=(new Common)->renderDelCache("about_us/index.html");
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
        $this->view("home/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log , $profile,$cart,$privilege,$add,$favorites);
    }

    public function forgotten() {
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
        $logmod = $this->model("LoginModel");
        $forgotten = $logmod->forgottenRender();
        $for_token = $logmod->generateForgottenToken();
        $this->view("login/forgotten/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add="",$favorites = "", $login = "", $log_token = "", $forgotten, $for_token);
    }

    public function reveal() {
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
        $logmod = $this->model("LoginModel");
        $forgotten = $logmod->forgottenRender();
        $for_token = $logmod->generateForgottenToken();
        $this->view("login/forgotten/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add="",$favorites = "", $login = "",$log_token = "",  $forgotten, $for_token);
    }

    public function activation($email="",$token="") {
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
        $logmod = $this->model("LoginModel");
        $activate = $logmod->activate($email,$token);
		if($token!="" && $email!=""){
			$this->view("login/activate/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege,$add="",$favorites = "", $login = "", $log_token = "", $forgotten = "", $for_token = "", $activate);
		}else{
			  $this->view("login/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log, $profile, $cart,$privilege);
		}
       
    }

}

?>