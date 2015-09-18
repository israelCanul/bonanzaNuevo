<div class="row">
	<div class="col-xs-10 col-xs-offset-1"> 
		<h2>There was an error with your transaction.</h2>
	    <br/>
        <div class="col-xs-12"><? if($_SESSION['error']!="" && isset($_SESSION['error']) ) {print_r($_SESSION['error']);}else{ print_r($_GET['ref']); }?></div>
        <br><br>
        <br/>
        <p>If you need inmediate assistance, please click Chat Online to talk to one of our agents or <a href="<?php echo Yii::app()->request->baseUrl; ?>/#contact" target="_blank">contact us</a>.</p>
        <br/>
        <br/>
    	<p> Av. de los colegios #37 por Av. Bonfil Calle de acceso (L28)<br />
            Sm 309 Mz 16 Lt 37<br />
            <strong>Zip code</strong>: 77560<br />
            <strong>From the US:</strong> 011(52) 998 8819400<br />
            <strong>In M&eacute;xico:</strong> (52) 998 8819400<br />
            <strong>email: </strong><a href="mailto:sales@lomas-travel.com">sales@lomas-travel.com</a></p>
        <br/>
	</div>		  	
</div>
<? $_SESSION['error']=""; ?>