<?php 
class Session{

	// session starting
	public static function init(){
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == '') {
				session_start();
			}
		}else{
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}

	// set value in session
	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}

	// get value of session
	public static function get($key){
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	// if user no sign in system, redirect to page login and user can't open page index

	public static function checkSession(){
		if (self::get("login") == false) {
			self::destroy();
			header("Location:login.php");
		}
	}

	// if user sign in system, redirect to page index and user can't open page login and sing in

	public static function checkLogin(){
		if (self::get("login") == true) {
			header("Location:index.php");
		}
	}

	//destroy session

	public static function destroy(){
			session_destroy();
			session_unset();
			header("Location: login.php");
		}
}
?>