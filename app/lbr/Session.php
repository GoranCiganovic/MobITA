<?php
	class Session {

		private static $_sessionStarted=false;

		public static function start() {
			if(self::$_sessionStarted==false) {
				session_start();
				self::$_sessionStarted=true;
			}
		}

		public static function destroy() {
			if(self::$_sessionStarted==true) {
				self::$_sessionStarted=false;
				$_SESSION = array();
				session_unset();
				session_destroy();
			}
		}

		public static function set($key, $value) {
			if(self::$_sessionStarted==false)
				self::start();
			$_SESSION[$key]=$value;
		}

		public static function get($key, $secondKey=false) {
			if($secondKey==true) {
				if(isset($_SESSION[$key][$secondKey]))
					return $_SESSION[$key][$secondKey];
			}
			if(isset($_SESSION[$key]))
				return $_SESSION[$key];
			else
				return false;
		}

		public static function unreg($key) {
			if(isset($_SESSION[$key]))
				unset($_SESSION[$key]);
		}

		public static function display() {
			if(self::$_sessionStarted==true) {
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
			}
		}
	}
?>