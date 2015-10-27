<?
if($_SERVER['SERVER_NAME']=='bonanza.com.dev'){

	return array(		
	"class" => "CDbConnection",	
	'connectionString' => 'mysql:host=localhost;dbname=lomasbet_extranet',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '1234',
	'charset' => 'utf8',
	
	);

}else{


}	
?>
