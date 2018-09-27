<?php

class BD_Connection {
	function getConnection(){
		$username = "root";
		$password = "";
		$host = "localhost";
		$db = "crud";
		$connection = new PDO("mysql:dbname=$db;host=$host;charset=utf8mb4", $username, $password);
		return $connection;
	}
}