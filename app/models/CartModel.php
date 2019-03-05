<?php

	class CartModel  {
		
		public function renderUserInfo(){
			try{
				Session::start();
				$user_id=Session::get("user_id");
				if($user_id){
					$user=Users::GetOne($user_id);
					if($user===false){
						throw new Exception($user);
					}else{
						return $user;
					}					
				}
			}catch(Exception $e){
				$message="Greška kod prikaza informacija o korisniku: ".$e->getMessage();
				$code=$e->getCode();
				$file=$e->getFile();
				$line=$e->getLine();
				$trace_as_string=$e->getTraceAsString();
				$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
			}
		}
		
		public function renderPhoneAdd($phone_id){
			try{
				Session::start();
					if(isset($phone_id) && is_numeric($phone_id)){
						$phone_id = filter_var($phone_id, FILTER_SANITIZE_NUMBER_INT);
						$phone_id = (new Validate)->securityFilter($phone_id);
						$phones=Phones::GetAll("phones.id","WHERE phones.status_id = 1 AND phones.stock > 0 AND phones.id='{$phone_id}'");
						if($phones){
							if(isset($_POST[$phone_id])){
								$stock = filter_var($_POST[$phone_id], FILTER_SANITIZE_NUMBER_INT);
								$stock = (new Validate)->securityFilter($stock);	
							}else{
								$stock="1";
							}
							
							$phone=Phones::GetOne($phone_id);
							$image=Images::GetAll("images.path as img_path, images.description as img_desc","WHERE images.phone_id='{$phone_id}' AND images.status_id =1 LIMIT 1");
							$phone_price_sumary=$phone->price;
							$sumary=$phone_price_sumary*$stock;
							foreach($image as $img){
								$img_path=$img->img_path;
								$img_desc=$img->img_desc;
							}
							$add=array("quantity"=>$stock,"img_path"=>$img_path,"img_desc"=>$img_desc,"sumary"=>$sumary);
							$merge = (object)array_merge((array)$add, (array)$phone);
							$cart=Session::get("cart");
							if($cart==false){
								$arr=array();
								array_push($arr,$phone_id);
								Session::set("arr",$arr);
								$cart=array();
								array_push($cart,$merge);
								Session::set("cart",$cart);
								$cart=Session::get("cart");
							}else{
								$arr=Session::get("arr");
								$id=in_array($phone_id,$arr);
								if(!$id){
									$cart=Session::get("cart");
									array_push($cart,$merge);
									Session::set("cart",$cart);
									array_push($arr,$phone_id);
									Session::set("arr",$arr);
									
								}else if($id && !empty($_POST[$phone_id])){
									$phID = filter_var($_POST[$phone_id], FILTER_SANITIZE_NUMBER_INT);
									$phID = (new Validate)->securityFilter($phID);
									$hiddID = filter_var($_POST['hiddID'], FILTER_SANITIZE_NUMBER_INT);
									$hiddID = (new Validate)->securityFilter($hiddID);
									$cart[$hiddID]->quantity=$phID;
									$sumary=$phone_price_sumary*$phID;
									$cart[$hiddID]->sumary=$sumary;
									Session::set("cart",$cart);
									$cart=Session::get("cart");
								}
							}
							if(isset($_POST['cartsubmit'])){
								$cartsubmit = filter_var($_POST['cartsubmit'], FILTER_SANITIZE_STRING);
								$cartsubmit = (new Validate)->securityFilter($cartsubmit);
								if($cartsubmit=="ADMINISTRACIJA"){
									return $cartsubmit=true;
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
		
		public function renderPhoneCart(){
			try{
				Session::start();
				$cart=Session::get("cart");
				if($cart){
					if(isset($_POST['submitremove']) && isset($_POST['hiddenID']) && isset($_POST['phoneID'])){
						$hiddenID = filter_var($_POST['hiddenID'], FILTER_SANITIZE_NUMBER_INT);
						$hiddenID = (new Validate)->securityFilter($hiddenID);
						$phoneID = filter_var($_POST['phoneID'], FILTER_SANITIZE_NUMBER_INT);
						$phoneID = (new Validate)->securityFilter($phoneID);
						unset($cart[$hiddenID]);
						Session::set("cart",$cart);
						$cart=Session::get("cart");
						$arr=Session::get("arr");
						if (($key = array_search($phoneID, $arr)) !== false) {
							unset($arr[$key]);
							Session::set("arr",$arr);
							$arr=Session::get("arr");
						}
						return $cart;
					}else{
						return $cart;
					}
				}else{
					return $cart=false;
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
		
		public function renderSum($phoneCart){
			try{
				if(!empty($phoneCart)){
					$sum = 0;  
					foreach($phoneCart as $phone=>$value){
							$sum += $value->sumary;
							$sum=number_format($sum, 3);
					}
					if($sum===false){
						throw new Exception($sum);
						
					}else{
						return $sum;
					}
				}
				
			}catch(Exception $e){
				$message="Greška kod prikaza ukupnog iznosa: ".$e->getMessage();
				$code=$e->getCode();
				$file=$e->getFile();
				$line=$e->getLine();
				$trace_as_string=$e->getTraceAsString();
				$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
			}
		}

		public function renderCartOrder(){
			try{
				Session::start();
				if(isset($_POST['submitorder'])){
					if(isset($_POST['accept'])){
						$accept = filter_var($_POST['accept'], FILTER_SANITIZE_STRING);
						$accept = (new Validate)->securityFilter($accept);
						if($accept=="prihvatam"){
							$user_id=Session::get("user_id");
							$cart=Session::get("cart");
							$sum=$this->renderSum($cart);
							if($user_id && $cart && $sum){
								foreach($cart as $key=>$value){
									
									date_default_timezone_set("Europe/Belgrade");
									$order_date = date("Y-m-j H:i:s ");
									$ip = $_SERVER['REMOTE_ADDR'];
									$order=new Orders();
									$order->quantity=$value->quantity;
									$order->price=$value->price;
									$order->total=$value->sumary;
									$order->date=$order_date;
									$order->ip=$ip;
									$order->user_id=$user_id;
									$order->phone_id=$value->id;
									$order->status_id="1";
									$order->Insert();
									$phone=Phones::GetOne($value->id);
									$phone->stock=$phone->stock-$value->quantity;
									$phone->Update();
									
									Session::unreg("cart");
									
									try{
										$to=ADMIN;
										$subject="MobITA-nova narudžbenica!";
										$message="Imate novu narudžbenicu na sajtu MobITA-www.mobita.goranciganovic.com";
										$from_name="MobITA";
										$from_email="NE ODGOVARAJ NA OVU PORUKU";
										$send=(new Common)->sendEmail($to,$subject,$message,$from_name,$from_email);
									}catch(Exception $e){
										$message="Greška kod slanja emaila administratoru prilikom nove narudžbenice: ".$e->getMessage();
										$code=$e->getCode();
										$file=$e->getFile();
										$line=$e->getLine();
										$trace_as_string=$e->getTraceAsString();
										$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
									}
									
								}
							}
						}else{
							return $accept="Koristite samo prosleđena polja u formi";
						}
					}else{
						return $accept="Morate prihvatiti uslove uslove korišćenja da biste izvršili naručivanje!";
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
		
		public function renderUserOrders(){
			try{
				Session::start();
				$user_id=Session::get("user_id");
				$orders=Orders::GetAll("orders.id as order_id, orders.quantity as order_quantity, orders.price as order_price, orders.date as order_date, orders.ip as order_ip,orders.user_id as order_user_id, orders.phone_id as order_phone_id, orders.status_id as order_status_id, order_status.name as order_status_name,phones.id as phone_id, phones.name as phone_name","JOIN phones ON orders.phone_id=phones.id JOIN users ON orders.user_id=users.id JOIN order_status ON orders.status_id=order_status.id WHERE orders.user_id='{$user_id}' AND orders.status_id=5 ORDER BY orders.date DESC");
				if($orders===false){
					throw new Exception($orders);
				}else{
					return $orders;
				}
			}catch(Exception $e){
				$message="Greška kod prikaza narudžbina korisnika: ".$e->getMessage();
				$code=$e->getCode();
				$file=$e->getFile();
				$line=$e->getLine();
				$trace_as_string=$e->getTraceAsString();
				$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
			}
		}
		
		public function renderHistoryOrders($order_id){
			try{
				Session::start();
				if($order_id){
					$order_id = filter_var($order_id, FILTER_SANITIZE_NUMBER_INT);
					$order_id = (new Validate)->securityFilter($order_id);
					$orders=Orders::GetAll("orders.id, orders.phone_id","WHERE orders.id='{$order_id}' AND orders.status_id=5 LIMIT 1");
					if($orders){
						foreach($orders as $phone){$phone_id=$phone->phone_id;}
						$order=Orders::GetAll("orders.id as order_id, orders.quantity as order_quantity, orders.price as order_price, orders.total as order_total, orders.date as order_date,orders.ip as order_ip, orders.user_id as user_id, orders.phone_id as phone_id, orders.status_id as status_id,phones.name as phone_name,images.path as img_path, images.description as img_desc","JOIN phones ON orders.phone_id=phones.id JOIN images ON phones.id=images.phone_id WHERE  orders.id='{$order_id}' AND orders.status_id=5 AND phones.id='{$phone_id}' AND images.phone_id='{$phone_id}' AND images.status_id =1 LIMIT 1");
						if($order){
							return $order;
						}else{
							return $order=false;
						}
					}else{
						return $order=false;
					}
				}else{
					return $order=false;
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
}
?>