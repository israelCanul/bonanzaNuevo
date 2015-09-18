<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
   <!-- Archivos JS *************************************************************************************************** -->
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js" type="text/javascript"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.validate.js" type="text/javascript"></script>
   <!-- js de la pagina -->
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tour.js"></script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pluginValidation.js"></script>
  


   <!-- Archivos CSS ****************************************************************************************************** -->   
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
   <!-- css de la pagina -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fuente.css"> 
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/other.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="menuPrincipal row">
	<div class="itemMenu col-xs-4 col-sm-3">
		<a data-ajax="false" href="<?php echo Yii::app()->request->baseUrl;?>/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logoPrincipal.png"></a>
	</div>
	<div class="itemMenu col-xs-8 col-sm-9" style="padding: 35px;">
	    <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header hidden-sm hidden-md hidden-lg">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <div class="col-xs-6">
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
                  </div>
                  <div class="col-xs-6"><span class=""><b style="color:rgba(152,0,0,1)">Menu</b></span></div>
                </button>
                
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="z-index:2">
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/#descriptions">Tour</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/#galeriaEventos">Galería</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/#textoGaleria">Eventos</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/#about_us">Conózcanos</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/#contact">Contacto</a></li>
          <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="<?php echo Yii::app()->request->baseUrl; ?>/es"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/flag-ES.png"></a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>	

	</div>
</div>
  <div id="content">
	<?php echo $content; ?>
  </div>

</body>
</html>