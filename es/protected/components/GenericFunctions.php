<?

class GenericFunctions extends CApplicationComponent{  




	public function verificaDisponibilidadTour($day){
		$ssql = Yii::app()->db->createCommand("SELECT
													opera_domingo AS '0',
													opera_lunes AS '1',
													opera_martes AS '2',
													opera_miercoles AS '3',
													opera_jueves AS '4',
													opera_viernes AS '5',
													opera_sabado AS '6'
													FROM tour
													WHERE tour_id = '1005'
													and tour_status='1'")->queryRow();

		return $ssql[$day] == '1' ? true : false;
	} 
	public function obtenerTarifas($day,$zona){

		$ssql = Yii::app()->db->createCommand("SELECT
												tarifa_precio_adulto_usd as tar_adult,
												tarifa_precio_menor_usd  as tar_child
												FROM tour_tarifa
												WHERE tarifa_tour = '1005'
												AND tarifa_zona='$zona'
												AND '$day' BETWEEN tarifa_fecha_inicio 
												AND tarifa_fecha_final")->queryRow();
 
		return $ssql;
	}
	 public function obtenerTipoCambio(){

            $ssql =Yii::app()->dbWeblt->createCommand("SELECT moneda_cambio AS cambio FROM monedas WHERE moneda_codigo ='USD' AND moneda_nombre='Dollar Americano'")->queryAll();
            $txtId = 1;

            if(count($ssql)>0){
            	$txtId = $ssql[0]['cambio'];
            }
            
		return $txtId;
    }

    public function setVariableSession($varsession){
    	if(!isset($varsession) || empty($varsession) || $varsession==""){
    		
			$_SESSION['error']="Variable de session no definida en setVariableSession";
			header("Location: /transaction_error");
			exit();
    	}else{
    		$idioma=Yii::app()->language;	
	    	if($idioma =='es') {
	    		$_SESSION['bookin_ES']=$varsession;
	    	}else{
	    		$_SESSION['bookin']=$varsession;
	    	}
    	}
    }

    public function setNullVariableSession(){

    		$idioma=Yii::app()->language;	
	    	if($idioma =='es') {
	    		$_SESSION['bookin_ES']="";
	    	}else{
	    		$_SESSION['bookin']="";
	    	}
    }    

    public function getVariableSession(){
    	$idioma=Yii::app()->language;

    	if($idioma=='es') {
    		$varsession=$_SESSION['bookin_ES'];
	    }else{
	    	$varsession=$_SESSION['bookin'];
	    }
    	
    	if(!isset($varsession) || empty($varsession) || $varsession==""){
			//$_SESSION['error']="Variable de session no definida, o la operacion ya fue realizada en getVariableSession.";
			header("Location: /");
			exit();
    	}else{
    		return $varsession;
    	}
    }

    function convierteFechaLetra($fecha,$completo){
    	$idioma=Yii::app()->language;

   	    if($idioma=='es') {
   	    	list($dia, $mes, $anio) = explode("-",$fecha);
   	    }else{
   	    	list($mes, $dia, $anio) = explode("-",$fecha);
   	    }


        $meses_ing_letra=array("01"=>"January", "02"=>"February", "03"=>"March", "04"=>"April", "05"=>"May", "06"=>"June",
                               "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");

        $meses_esp_letra=array("01"=>"Enero", "02"=>"Febrero", "03"=>"Marzo", "04"=>"Abril", "05"=>"Mayo", "06"=>"Junio",
                          "07"=>"Julio", "08"=>"Agosto", "09"=>"Septiembre", "10"=>"Octubre", "11"=>"Noviembre", "12"=>"Diciembre");
        $dia = $dia*1;

	    switch($idioma) {
	   	  case 'en':
	   	  		   $fecha_letra=(($completo==1) ? $dia." ".$meses_ing_letra[$mes]." ".$anio : $dia." ".substr($meses_ing_letra[$mes],0,3));
	   	  		   break;
		  case 'es':
		  		   $fecha_letra=(($completo==1) ? $dia." de ".$meses_esp_letra[$mes]." de ".$anio : $dia." de ".substr($meses_esp_letra[$mes],0,3));
		  		   break;
	    }


		$numDia = date("w",mktime(0, 0, 0, $mes, $dia, $anio));
		$dias_ing=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		$dias_esp=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

		switch($idioma) {
	   	  case 'en':$txtDia=(($completo==1) ? $dias_ing[$numDia] : substr($dias_ing[$numDia],0,3)); break;
		  case 'es':$txtDia=(($completo==1) ? $dias_esp[$numDia] : substr($dias_esp[$numDia],0,3));break;
	    }

	    $fecha_letra = $txtDia.", ".$fecha_letra;
		return $fecha_letra;	    

    }

    function cargarPais($select="",$agencia=0){
	    	$ssql =  Yii::app()->db->createCommand("SELECT
				PAI_ISO3 as folio,
				PAI_NOMBRE as zona
				FROM paises
				ORDER BY PAI_NOMBRE ASC ")->queryAll();

		    if($ssql!=""){// verifica que la consulta no este vacia
		      $lista ="<option value=''>Select</option>";
		          foreach($ssql as $row=>$key_val) {  // asocia cada una de sus lineas con un array
		          	
		          	$folio=$key_val['folio']; 
		          	$zona=$key_val['zona'];

				   	if($agencia==0){
						if(Yii::app()->session["datos_usuario"]["pais"]==$key_val['folio']){
							if(Yii::app()->session["datos_usuario"]["pais"]!=''){
							$lista .= "<option value='".$folio."' selected='selected'>".$zona."</option>";
							}else{
								$lista .= "<option value='".$folio."'>".$zona."</option>";
							}
						}
						else{
							$lista .= "<option value='".$folio."'>".$zona."</option>";	
						}
				    }else{
					    $lista .= "<option value='".$folio."'>".$zona."</option>";	
					}
				}
		    }

		echo $lista;
    }

function obtenerIP(){

	if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	{
	$client_ip =
	( !empty($_SERVER['REMOTE_ADDR']) ) ?
	$_SERVER['REMOTE_ADDR']
	:
	( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	$_ENV['REMOTE_ADDR']
	:
	"unknown" );

	// los proxys van a�adiendo al final de esta cabecera
	// las direcciones ip que van "ocultando". Para localizar la ip real
	// del usuario se comienza a mirar por el principio hasta encontrar
	// una direcci�n ip que no sea del rango privado. En caso de no
	// encontrarse ninguna se toma como valor el REMOTE_ADDR

	$entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

	reset($entries);
	while (list(, $entry) = each($entries))
	{
	$entry = trim($entry);
	if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
	{
	// http://www.faqs.org/rfcs/rfc1918.html
	$private_ip = array(
	'/^0\./',
	'/^127\.0\.0\.1/',
	'/^192\.168\..*/',
	'/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
	'/^10\..*/');

	$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

	if ($client_ip != $found_ip)
	{
	$client_ip = $found_ip;
	break;
	}
	}
	}
	}
	else
	{
	$client_ip =
	( !empty($_SERVER['REMOTE_ADDR']) ) ?
	$_SERVER['REMOTE_ADDR']
	:
	( ( !empty($_ENV['REMOTE_ADDR']) ) ?
	$_ENV['REMOTE_ADDR']
	:
	"unknown" );
	}

	return $client_ip;

	}


	public function obtener_pais(){
		require_once($_SERVER['DOCUMENT_ROOT']."/includes/geoip.inc");

			$gi = geoip_open($_SERVER['DOCUMENT_ROOT']."/includes/GeoIP.dat",GEOIP_STANDARD);
			$ipCliente = Yii::app()->GenericFunctions->obtenerIP();
			$t_cod_pais = geoip_country_code_by_addr($gi, $ipCliente);
			if ($ipCliente == '127.0.0.1') {
				$t_cod_pais = 'MX';
			}
			//print_r($ipCliente);
			return $t_cod_pais;
	}


	public function ProtectVar($password){
			$encryptedPass = str_rot13(base64_encode(serialize($password . "LomasCiPhrase")));;		
			return $encryptedPass;
	}

}
?>	