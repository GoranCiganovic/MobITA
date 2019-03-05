<?php
class Validate {
	
    public function securityFilter($data) {

        if (is_array($data)) {
            foreach ($data as $key => $element) {
                $data[$key] = self::securityFilter($element);
            }
        } else {
            $data = trim(htmlspecialchars(strip_tags($data)));
            if (get_magic_quotes_gpc())
                $data = stripslashes($data);
            $db = Database::GetInstance();
            $data = mysqli_real_escape_string($db, $data);
        }
        return $data;
    }
}

	
?>