<?php

if($_SERVER['SERVER_NAME']=='bonanza.com.dev'){

	return array(		
	"class" => "CDbConnection",	
	'connectionString' => 'mysql:host=localhost;dbname=lomasbet_admin',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
	);

}else{

	return array(
	"class" => "CDbConnection",	
	'connectionString' => 'mysql:host=lomastravel.com;dbname=lomasbet_admin',
	'emulatePrepare' => true,
	'username' => 'lomasbet',
	'password' => 'CGQ%LF*w2r',
	'charset' => 'utf8',
	);

}	


?>