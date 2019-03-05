<?php

class Register extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "", $login="",$login_token="",$register = "", $reg_token = "",$log = "", $profile = "",$cart="",$privilege="",$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user="",$cartInfo="") {

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
		$reg = $this->model("RegisterModel");
        $register = $reg->registerRender();
        $reg_token = $reg->generateRegisterToken();
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
            $this->view("superadmin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="", $register, $reg_token,$log, $profile,$cart,$privilege,$add,$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user,$cartInfo="");
        } else if ($privilege == 2) {
            $this->view("admin/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="", $register, $reg_token,$log, $profile,$cart,$privilege,$add,$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user,$cartInfo="");
        } else if ($privilege == 3 && !$cartInfo) {
            $this->view("user/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="", $register, $reg_token,$log, $profile,$cart,$privilege,$add,$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user,$cartInfo="");
        } else if($privilege == 3 && $cartInfo){
			$this->view("cart/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd,$userOrders,$phoneCart,$sum,$cartOrder,$user,$cartInfo);
		}else {
           $this->view("register/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="", $register, $reg_token,$log, $profile,$cart,$privilege="",$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="", $user,$cartInfo="");
        }
		
    }

}

?>