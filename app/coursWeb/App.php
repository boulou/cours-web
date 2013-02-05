<?php
namespace coursWeb;
//use coursWeb\Utils;

class App{
	
	public static $db = false;
	
	public static function get08()
	{
		if(self::$db == false)
		{
			self::$db = new \PDO(DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
			self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
			self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
			self::$db->exec("SET CHARACTER SET utf8");
		}
	}
	
	public static function handleConnectFrom()
	{
		$db = self::get08();
		Utils::debug($_POST);
		
		if(isset($_REQUEST['logout']))
		{
			session_destroy();
			header('Location: index.php');
		}
		else if(isset($_POST['action-register']))
		{
			User::register($_POST['login'], $_POST['password']);
		}
		else if(isset($_POST['action-login']))
			User::login($_POST['login'], $_POST['password']);
		
		echo 'ok handle';
	}
}