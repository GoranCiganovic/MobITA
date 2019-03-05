<?php

class SuperadminModel {

	public function renderErrors(){
		try{
			Session::start();
			$errors=Errors::GetAll("errors.id, errors.message, errors.code, errors.file, errors.line, errors.trace, errors.trace_as_string, errors.date","ORDER BY errors.date ASC");
			if($errors===false){
				throw new Exception($errors);
				return $errors=false;
			}else{
				return $errors;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza grešaka: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
	}
	public function renderErrContent($id){
		try{
			Session::start();
			if(!empty($_POST['errorcontent']) && $id){
				$this->id=$id;
			}else{
				$id="";
			}
			$errcontent=Errors::GetAll("errors.id, errors.message, errors.code, errors.file, errors.line, errors.trace, errors.trace_as_string, errors.date","WHERE errors.id='{$id}'");
			if($errcontent===false){
				throw new Exception($errcontent);
				return $errcontent=false;
			}else{
				return $errcontent;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza sadržaja grešaka: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
	}
	
	public function renderErrDelete($id){
		try{
			Session::start();
			if(!empty($_POST['errordelete']) && $id){
				$errdelete=Errors::Delete($id);
				if($errdelete===false){
					throw new Exception($errdelete);
					return $errdelete=false;
				}
			}
		}catch(Exception $e){
			$message="Greška kod prikaza brisanja greške: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
	}
	
	public function renderAdmin($id=""){
		try{
			Session::start();
			$q1="users.id,users.first_name, users.last_name, users.email, users.phone_number, users.address, users.city, users.registration_date, users.ip,users.last_logged_time, users.last_logged_ip, users.postal_code, users.status_id, user_status.name as status, users.privilege_id, privileges.name as privileges";
			$q2="JOIN user_status ON user_status.id=users.status_id JOIN privileges ON privileges.id=users.privilege_id WHERE users.privilege_id=2";
			if(isset($_POST['active'])){
				try{
					$q2.=" AND user_status.id=1 ";
					$admins=Users::GetAll($q1,$q2);
					if($admins===false){
						throw new Exception($admins);
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza aktivnih administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}	
			}else if(isset($_POST['banned'])){
				try{
					$q2.=" AND user_status.id=3 ";
					$admins=Users::GetAll($q1,$q2);
					if($admins===false){
						throw new Exception($admins);
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza zabranjenih administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}	
			}else if(isset($_POST['profile'])){
				try{
					$q2.=" AND users.id ='{$id}' ";
					$admins=Users::GetAll($q1,$q2);
					if($admins===false){
						throw new Exception($admins);
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza profila administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}	
			}else if(isset($_POST['act'])){
				try{
					$active=Users::GetOne($id);
					$active->status_id="1";
					$active->Update();
					$q2.=" AND users.id ='{$id}' ";
					$admins=Users::GetAll($q1,$q2);
					if($active===false){
						throw new Exception($active);
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod izmene aktivnog statusa administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}	
			}else if(isset($_POST['bann'])){
				try{
					$banned=Users::GetOne($id);
					$banned->status_id="3";
					$banned->Update();
					$q2.=" AND users.id ='{$id}' ";
					$admins=Users::GetAll($q1,$q2);
					if($banned===false){
						throw new Exception($banned);
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod izmene zabranjenog statusa administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
				}	
			}else{
				try{
					$admins=Users::GetAll($q1,$q2);
					if($admins===false){
						throw new Exception($admins);
						
					}else{
						return $admins;
					}
				}catch(Exception $e){
					$message="Greška kod prikaza administratora: ".$e->getMessage();
					$code=$e->getCode();
					$file=$e->getFile();
					$line=$e->getLine();
					$trace_as_string=$e->getTraceAsString();
					$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
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
	
	public function renderShowLog(){
		try{
			$log = "../app/log/hacklog.log";
			$handle = fopen($log, "r");
			$contents = fread($handle, filesize($log));
			if($contents===false){
				throw new Exception($contents);
				return $contents=false;
			}else{
				return $contents;
			}
		}catch(Exception $e){
			$message="Greška kod prikaza logova: ".$e->getMessage();
			$code=$e->getCode();
			$file=$e->getFile();
			$line=$e->getLine();
			$trace_as_string=$e->getTraceAsString();
			$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
		}
	}
	
	
	
}

?>