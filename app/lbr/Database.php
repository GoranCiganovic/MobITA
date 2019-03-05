<?php

class Database {

    private static $instance = null;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = mysqli_connect(DBHOST, DBUSER, DBPASS, DB);
            if (self::$instance->connect_errno) {
                die("Greška prilikom povezivanja na server:" . self::$instance->connect_error);
            }
            mysqli_query(self::$instance, "SET names utf8");
        }
        return self::$instance;
    }

}

?>