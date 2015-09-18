<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->pageTitle="Bonanza";
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
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


	public function actionContact()
	{
	
    }

   
	public function actioncargar_hoteles_venta(){
		if((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {

			$ssql =Yii::app()->db->createCommand("SELECT destino_nombre_".Yii::app()->language." AS hotel,zona_destino AS zona FROM transportacion_zona_destinos,transportacion_zona WHERE destino_zona=zona_id AND zona_id BETWEEN '2' AND '6' ORDER BY hotel")->queryAll();

            $arrayName=array();
			if(count($ssql)>0){
				foreach ($ssql as $key => $result) {
					$hotel = trim($result['hotel']);
					$zona = trim($result['zona']);	


					array_push($arrayName, array('value'=>$hotel,'data'=>$zona));					
				}
			}
			
			echo json_encode($arrayName);
		}

	}

}