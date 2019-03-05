<?php

class Token {

    public function generateToken($formName) {
        $token = md5(uniqid(rand(1, 1000000), true) . TOKEN_FORM_SALT);
        $_SESSION[$formName . "_token"] = $token;
        $_SESSION[$formName . "token_time"] = time();
        return $token;
    }

    public function verifyFormToken($formName, $token) {
        $isValid = true;
        $sessionTokenValue = "";
        if (!isset($_SESSION[$formName . '_token']) || !isset($_SESSION[$formName . "token_time"])) {
            $isValid = false;
        } else {
            $sessionTokenValue = $_SESSION[$formName . '_token'];
        }

        if ($isValid && ($sessionTokenValue !== $token || (time() - $_SESSION[$formName . "token_time"] > 3000))) {
            $isValid = false;
        }
        return $isValid;
    }

    public function setLog($where) {
        $ip = $_SERVER["REMOTE_ADDR"];
        $host = gethostbyaddr($ip);
        $date = date("d M Y");

        $logging = <<<LOG
			\n
			<< početak poruke >>
			Datum napada: {$date}
			IP-Adresa: {$ip} \n
			Host napadača: {$host}
			Namera napadača: {$where}
			<< Kraj poruke >>
LOG;
        
        if ($handle = fopen('../app/log/hacklog.log', 'a')) {
            fputs($handle, $logging);
            fclose($handle);
        } else {
            $to = 'ciga@beogrid.net';
            $subject = 'Hakerski napad na sajtu MobITA';
			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/plain; charset=utf-8";
			$headers[] = "From: MobITA <admin@mobita.com>";
			$headers[] = "Reply-To: NE ODGOVARAJ NA OVU PORUKU <do_not_reply>";
			$headers[] = "Subject: {$subject}";
			$headers[] = "X-Mailer: PHP/".phpversion();
			try{
				if ($send=@mail($to, $subject, $logging,  implode("\r\n", $headers))===false) {
						 throw new Exception($send);
				} 
			}catch(Exception $e) {
				$message="Greška kod slanja emaila Adminstratoru prilikom pokušaja hakovanja: ".$e->getMessage();
				$code=$e->getCode();
				$file=$e->getFile();
				$line=$e->getLine();
				$trace_as_string=$e->getTraceAsString();
				$errorMsg=(new CustomException)->insertError($message,$code,$file,$line,$trace_as_string);
			}
        }
    }
}

?>