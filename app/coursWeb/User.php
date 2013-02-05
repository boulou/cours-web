<?php
namespace coursWeb;

class User{
	
	private $id;
	private $login;
	private $xp = 0;
	private $hp = 0;
	private $power = 0;
	
	private function __construct($id, $login, $xp, $hp, $power)
	{
		$this->id = (int)$id;
		$this->login = $login;
		$this->xp = (int)$xp;
		$this->hp = (int)$hp;
		$this->power = (int)$power;
	}
	
	public function getXP()
	{
		return $this->xp;
	}
	
	public function addXP($killCount)
	{
		$this->xp += $killCount * 10;
	}
	
	public static function register($login, $hash)
	{
		$query = App::$db->prepare('INSERT INTO user (login,password) VALUES (?,?)');
		$param = array($login, \passwordHashUtils::create_hash($hash));
		if($query->execute($param))
			echo 'registered';
	}
	
	public function toJSON(){
		return json_encode(array(
				'id' => $this->id,
				'login' => $this->login,
				'xp' => $this->xp,
				'hp' => $this->hp,
				'power' => $this->power,
		));
	}
	
	public static function login($login, $password)
	{		
		$query = App::$db->prepare('SELECT * FROM user WHERE login=? LIMIT 1');
		
		if($query->execute(array($login)))
		{
			$res = $query->fetch();
			if($res && \passwordHashUtils::validate_password($password, $res->password))
			{
				echo 'login OK';
				$_SESSION['user'] = new User($res->id, $res->login, $res->xp, $res->hp, $res->power);
			}
			else
				echo 'login NOK';
		}
		return false;
	}
}