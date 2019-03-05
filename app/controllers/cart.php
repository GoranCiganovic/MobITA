<?php

class Cart extends Controller {

    public function view($view, $date = "", $brands = "", $systems = "", $rams = "", $ints = "", $sims = "", $colors = "",$login="",  $log_token="", $register="", $reg_token="",$log = "", $profile = "",$cart="",$privilege="",$add="",$userInfo="",$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="",$orderHistory="") {

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
		$cart=$home->showcart("privilege_id");
		if($privilege==1){
			$this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="", $register="", $reg_token="",$log, $profile,$cart, $privilege,$add);
		}else if($privilege==2){
			 $this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="",$register="", $reg_token="", $log, $profile,$cart, $privilege,$add);
		}else{
			$this->view("cart/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd,$userOrders,$phoneCart,$sum);
		}
    }
	public function order($phone_id=""){
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
		$privilege = Session::get("privilege_id");
		$add=$home->showadd("privilege_id");
		$carts=$this->model("CartModel");
		$userInfo=$carts->renderUserInfo();
		$phoneAdd=$carts->renderPhoneAdd($phone_id);
		$userOrders=$carts->renderUserOrders();
		$phoneCart=$carts->renderPhoneCart();
		$sum=$carts->renderSum($phoneCart);
		$cartOrder=$carts->renderCartOrder();
		$cart=$home->showcart("privilege_id");
		if($privilege==1){
			$this->view("superadmin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="", $register="", $reg_token="",$log, $profile,$cart, $privilege,$add);
		}else if($privilege==2){
			 $this->view("admin/edit/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="",$register="", $reg_token="", $log, $profile,$cart, $privilege,$add);
		}else if($userInfo && $cartOrder==null){
			$this->view("cart/order/index", $date, $brands, $systems, $rams, $ints, $sims, $colors,$login="",  $log_token="",$register="", $reg_token="", $log, $profile,$cart, $privilege,$add,$userInfo);
		}else if($userInfo && $cartOrder==true){
			$this->view("cart/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd,$userOrders,$phoneCart,$sum,$cartOrder);
		}else if(!$userInfo){
			 $this->view("register/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="", $register, $reg_token,$log, $profile,$cart,$privilege,$add,$user="");
		}else{
			$this->view("cart/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd,$userOrders,$phoneCart,$sum,$cartOrder);
		}
	}
	
	public function accept(){
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
		$carts=$this->model("CartModel");
		$userInfo=$carts->renderUserInfo();
		$cart=$home->showcart("privilege_id");
		$this->view("cart/accept/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd="",$userOrders="",$phoneCart="",$sum="",$cartOrder="");
	
	}
	
	public function history($order_id=""){
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
		$carts=$this->model("CartModel");
		$userInfo=$carts->renderUserInfo();
		$userOrders=$carts->renderUserOrders();
		$phoneCart=$carts->renderPhoneCart();
		$cartOrder=$carts->renderCartOrder();
		$orderHistory=$carts->renderHistoryOrders($order_id);
		$cart=$home->showcart("privilege_id");
		if($userInfo){
			$this->view("cart/history/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd="",$userOrders,$phoneCart="",$sum="",$cartOrder="",$orderHistory);
		}else{
			$this->view("cart/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $login="",  $log_token="",$register="", $reg_token="",$log, $profile,$cart, $privilege,$add,$userInfo,$phoneAdd="",$userOrders,$phoneCart,$sum="");
		}
		
	}
	
}

?>