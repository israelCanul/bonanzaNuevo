<?php
	class LomasInit {
		public static function beginRequest(CEvent $event) {
			$pais=Yii::app()->GenericFunctions->obtener_pais();
			if($pais=='MX'){
				Yii::app()->params['Moneda']='MXN';
			}else{
				Yii::app()->params['Moneda']='USD';
			}
		}
	}
?>
 