<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
   <!-- Archivos JS *************************************************************************************************** -->
    <script src="http://www.jscache.com/wejs?wtype=excellent&amp;uniq=139&amp;locationId=1639421&amp;lang=en_US&amp;display_version=2"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js" type="text/javascript"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>   
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile-1.4.5.min.js" type="text/javascript"></script>
	 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqm-datebox.core.js"></script>
	 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqm-datebox.mode.calbox.js"></script>

   <!-- js de la pagina -->
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
   <!-- para el slider -->
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/owl.carousel.min.js"></script>
   <!-- js para el mapa  --> 
   <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>


   <!-- Archivos CSS ****************************************************************************************************** -->   
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.mobile-1.4.5.css">
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.mobile.icons-1.4.5.min.css">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dev.css">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/doc.css">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fuente.css"> 
   <!-- para el slider --> 
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.transitions.css">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.theme.css"> 
   <!-- css de la pagina -->
   <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="menuPrincipal row">
	<div class="itemMenu col-xs-4 col-sm-3">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logoPrincipal.png">
	</div>
	<div class="itemMenu col-xs-8 col-sm-9 menu" style="">
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
                <ul class="nav navbar-nav" style="z-index:2;background:white;">
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="#descriptions">The Tour</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="#galeriaEventos">Media</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="#textoGaleria">Events</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="#about_us">About Us</a></li>
				  <li role="presentation "><a class="opcPrincipal" data-ajax="false" href="#contact">Contact</a></li>
          <li role="presentation ">
            <div id="TA_excellent139" class="TA_excellent">
              <ul id="xHmP78ld" class="TA_links NwrR0Bxi">
              <li id="Z1lBjLRY" class="qC7pWp">
              <a target="_blank" href="http://www.tripadvisor.com/"><img src="http://static.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
              </li>
              </ul>
              </div>
              
          </li>
          <li role="presentation "><a class="opcPrincipal" data-ajax="false" href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/flag-ES.png"></a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>	

	</div>
</div>

	<?php echo $content; ?>

</body>
</html>
