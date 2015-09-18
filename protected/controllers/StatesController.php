<?php

class StatesController extends Controller
{
	public $layout='other';
    public function actionT_error(){
    	$this->render('errorT');
    }
    
    public function actionT_denied(){
    	$this->render('denegado');
    }

    public function actionT_aproved(){
		   	
		/* si la pagina esta en ingles se cambia la url de donde se toman las cartas confirma */
		//$link_papeleta = "http://www.lomastravel.com/voucher.html?id=" . $_GET['ref'];
		/* si la pagina esta en español se cambia la url de donde se toman las cartas confirma */
		//if(Yii::app()->language=='es') 	$link_papeleta = "http://www.lomastravel.com.mx/cupon.html?id=" . $_GET['ref'];
		                       	
		/* si es un test se cambia la peticion de la papeleta a local */
		//if(in_array($txtEmail,$email_test)){
			$link_papeleta = "http://lomasbeta.dev/voucher.html?id=" . $_GET['ref'];
			 /*si la pagina esta en español se cambia la url de donde se toman las cartas confirma */
			if(Yii::app()->language=='es') 	$link_papeleta = "http://lomasmx.dev/cupon.html?id=" . $_GET['ref'];
		//}

		$info = file_get_contents($link_papeleta);
		if($info==""){
			$info="No cargo ningun datos del link proporcionado";
		}
        
        $params=array('cartaConfirma' => $info);
    	$this->renderPartial('aproved',$params);
    }

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


}  