<?php

	class CustomException extends Exception {
	
		public function insertError($message,$code,$file,$line,$trace_as_string){
			$this->message=$message;
			$this->code=$code;
			$this->file=$file;
			$this->line=$line;
			$this->trace_as_string=$trace_as_string;
			
			$error=new Errors;
			$error->message=$message;
			$error->code=$code;
			$error->file=$file;
			$error->line=$line;
			$error->trace_as_string=$trace_as_string;
			date_default_timezone_set("Europe/Belgrade");
			$error_date = date("Y-m-j H:i:s ");
			$error->date=$error_date;
			$error->Insert();
		}
		
	}


?>