<?php

class Ajax extends Controller {

     public function index($input="") {
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
        $search = $home->searchRender($input);
		$carts=$this->model("CartModel");
		$cart=$home->showcart("privilege_id");
	
		require_once "../app/views/home/search/index.php";
		$this->view("home/search/index", $date, $brands, $systems, $rams, $ints, $sims, $colors, $log,$profile,$cart,$privilege,$add,$favorites, $allphones = "",$message="", $sidebar="", $search);	
		
	 }
	
     public function showCart(){
		 $home=$this->model("HomeModel");
		 $addtocart=$home->renderShowCart();
		 $this->view("cart/showcart/index",$addtocart);
	 }

	 
}

?>