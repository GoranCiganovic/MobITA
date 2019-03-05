<?php

class User extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $login="",  $log_token="",$register="", $reg_token="",$log = "", $profile = "", $cart="",$privilege = "", $add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="",$user = "", $update_token = "", $update = "",$cartInfo="") {

        require_once "../app/views/header/index.php";
        require_once "../app/views/sidebar/index.php";
        require_once "../app/views/" . $view . ".php";
        require_once "../app/views/footer/index.php";
    }

    public function index($phone_id="") {
        $home = $this->model("HomeModel");
        $date = $home->sitedate();
        $brands = $home->renderAllBrands();
        $systems = $home->renderAllSystems();
        $rams = $home->renderAllRams();
        $ints = $home->renderAllInts();
        $sims = $home->renderAllSims();
        $colors = $home->renderAllColors();
		$logmod = $this->model("LoginModel");
        $login = $logmod->loginRender();
        $log_token = $logmod->generateLoginToken();
        $log = $home->showlog("first_name");
        $profile = $home->showprofile("first_name");
		$cart=$home->showcart("privilege_id");
        $privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$carts=$this->model("CartModel");
		$userInfo=$carts->renderUserInfo();
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$userOrders=$carts->renderUserOrders();
		$phoneCart=$carts->renderPhoneCart();
		$sum=$carts->renderSum($phoneCart);
		$cartOrder=$carts->renderCartOrder();
        $data = $this->model("UserModel");
        $user = $data->userRender();
		$cartInfo=Session::get("cart");
        if ($privilege == 1) {
            $this->view("superadmin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login,  $log_token,$register="", $reg_token="",$log, $profile,$cart, $privilege,$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user);
        } else if ($privilege == 2) {
            $this->view("admin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login,  $log_token,$register="", $reg_token="", $log, $profile,$cart, $privilege,$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user);
        } else if ($privilege == 3) {
            $this->view("user/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login,  $log_token,$register="", $reg_token="", $log, $profile,$cart, $privilege,$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user);
		}else {
            $this->view("login/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login,  $log_token,$register="", $reg_token="", $log, $profile,$cart, $privilege="",$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="",$user = "");
        }
    }

    public function update() {
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
        $data = $this->model("UserModel");
        $update = $data->updateRender();
        $update_token = $data->generateUpdateToken();
		$user = $data->userRender();
		if($privilege) {
            $this->view("user/update/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user, $update_token, $update);
        } else {
            $this->view("login/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="",$register="", $reg_token="", $log, $profile,$cart,$privilege="",$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user = "", $update_token = "", $update = "");
        }
    }
}
?>
