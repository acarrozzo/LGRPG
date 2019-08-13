<?php

class DB {
	private static $instance;
	private $MySQLi;
	
	private function __construct(array $linkOptions){

		$this->MySQLi = @ new mysqli(	$linkOptions['db_host'],
										$linkOptions['db_user'],
										$linkOptions['db_pass'],
										$linkOptions['db_name'] );

		if (mysqli_connect_errno()) {
			throw new Exception('Database error.');
		}

		$this->MySQLi->set_charset("utf8");
	}
	
	public static function init(array $linkOptions){
		if(self::$instance instanceof self){
			return false;
		}
		
		self::$instance = new self($linkOptions);
	}
	
	public static function getMySQLiObject(){
		return self::$instance->MySQLi;
	}
	
	public static function query($q){
		return self::$instance->MySQLi->query($q);
	}
	
	public static function esc($str){
		return self::$instance->MySQLi->real_escape_string(htmlspecialchars($str));
	}
}

?>