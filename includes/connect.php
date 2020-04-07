<?php
	
	//To Connect with DataBase

	$dsn='mysql:host=localhost;dbname=shopmeextest';
	$user='root';
	$pass='';
	$option=array(
		PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
	);
	try{

		$db=new PDO($dsn,$user,$pass,$option);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	}
	catch (PDOException $e){
		echo 'failed to connect'.$e->getMessage();
	}