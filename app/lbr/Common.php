<?php

class Common {
	
	 public function sitedate() {
        $day = date("D");
        switch ($day) {
            case "Mon":
                $date = "Ponedeljak," . date(" j.m.Y.");
                break;
            case "Tue":
                $date = "Utorak," . date(" j.m.Y.");
                break;
            case "Wed":
                $date = "Sreda," . date(" j.m.Y.");
                break;
            case "Thu":
                $date = "Četvrtak," . date(" j.m.Y.");
                break;
            case "Fri":
                $date = "Petak," . date(" j.m.Y.");
                break;
            case "Sat":
                $date = "Subota," . date(" j.m.Y.");
                break;
            case "Sun":
                $date = "Nedelja," . date(" j.m.Y.");
                break;
        }
        return $date;
    }
		
    public function comaArray($data) {
        $arr = "";
        if (is_array($data)) {
            foreach ($data as $element) {
                $arr.="$element->id, ";
            }
        } else {
            foreach ($data as $element) {
                $arr .="$element, ";
            }
        }
        $arr = rtrim($arr, " ,");
        return $arr;
    }

    public function comaString($data) {
        $arr = "";
        foreach ($data as $element) {
            $arr .="$element, ";
        }
        $arr = rtrim($arr, " ,");
        return $arr;
    }
		
		
	public function renderSetCache($file){
		$duration=10;
		if(file_exists($file) and (time()-$duration)<filemtime($file)) {
			include "{$file}";
			exit;
		}
		ob_start();	
		return $file;
	}
	
	public function renderGetCache($file){
		$cache=fopen($file, "w");
		fwrite($cache, ob_get_contents());
		fclose($cache);
		ob_flush();
	}
	
	public function renderDelCache($file_path){
		$file_with_path = "../app/views/home/".$file_path;
		if (file_exists($file_with_path)) {
			unlink($file_with_path);
		}
	}
	
	public function sendEmail($to,$subject,$message,$from_name,$from_email){
		$message = wordwrap($message, 100, "\r\n");
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=utf-8";
		$headers[] = "From: {$from_name} < {$from_email} >";
		$headers[] = "Reply-To: {$from_name} < {$from_email} >";
		$headers[] = "Subject: {$subject}";
		$headers[] = "X-Mailer: PHP/".phpversion();
		$send=@mail($to, $subject, $message, implode("\r\n", $headers));
		return $send;
	}
	
}


?>