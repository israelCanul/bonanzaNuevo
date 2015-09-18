<!-- Video de inicio -->
<div class="row items" id="galeria">	
		<div id="wrapVideo"  class=" col-xs-12">
			<video id="videoPrincipal" class="video" loop preload="auto" name="media"><source src="<?php echo Yii::app()->request->baseUrl; ?>/images/video/bonanza1.mp4" type="video/mp4"></video>
		</div>		 
</div>
<div class="controls col-xs-12">
	<div class="col-xs-1" style="padding-left: 4px;padding-right:0px;"><img id="play" class="icono  hidden" data-sound="play" src="<?Yii::app()->request->baseUrl; ?>/images/iconos/play.png"><img class="icono" data-sound="pause" id="pause" src="<?Yii::app()->request->baseUrl; ?>/images/iconos/pause.png"></div>
	<div class="col-xs-1 col-xs-offset-10" style="padding-left: 0px;padding-right:9px;"><img class="icono  hidden" id="sound" data-sound="sound" src="<?Yii::app()->request->baseUrl; ?>/images/iconos/volume.png"  style="float:right;" ><img style="float:right;" data-sound="muted" class="icono" id="mute" src="<?Yii::app()->request->baseUrl; ?>/images/iconos/muted.png"></div>
</div>
<!-- Bookin -->
<div class="row items" id="bookin">
	<div class="col-xs-12" id="formBookin">
		<form class="form-inline" method="post" action="" id="frmBookin">
		  <input type="hidden" name="zona" id="zona">
		  <div class="form-group col-xs-12 col-sm-4 col-md-2">
		    <label class="hidden-xs" style="font-weight:bold;" for="departure">Saliendo de:</label>
		    <input required type="text" class="form-control etiqueta" id="saliendo" name="saliendo" placeholder="Saliendo de">
		  </div>
		  <div class="form-group col-xs-6 col-sm-4 col-md-2">
		    <label class="hidden-xs" style="font-weight:bold;" for="adults">Adultos</label>
		    	<select required class="form-Control etiqueta" id="adults" name="adults">
		    		<option value="">Adultos</option>
		    		<?
		    		for ($i=1; $i < 51; $i++) { 
		    			echo "<option value='$i'>$i</option>"; 
		    		}
		    		?>
		    	</select>
		  </div>
		  <div class="form-group col-xs-6 col-sm-4 col-md-2">
		    <label class="hidden-xs" style="font-weight:bold;" for="childs">Niños</label>
		    	<select class="form-Control etiqueta" id="childs" name="childs">
		    		<option value='0'>Niños</option>
		    		<?
		    		for ($i=1; $i < 51; $i++) { 
		    			echo "<option value='$i'>$i</option>"; 
		    		}
		    		?>
		    	</select>
		  </div>
		  <div class="form-group col-xs-6 col-sm-4 col-md-2">
		    <label class="hidden-xs" style="font-weight:bold;" for="departures">Horarios</label>
		    	<select required class="form-Control etiqueta" id="departures" name="departureTime">
		    		<option value="">Horario</option>
		    		<option value="09:30 am">09:30 am</option>
		    		<option value="12:00 pm">12:00 pm</option>
					<option value="03:00 pm">03:00 pm</option>		    		
		    	</select>
		  </div>		  
		  <div class="form-group col-xs-6 col-sm-4 col-md-2">
		    <label class="hidden-xs" style="font-weight:bold;" >Fecha</label>
		      <? if(Yii::app()->language=='es'){ ?>
		     <input required class=" etiqueta" type="text" min="<?=date('Y-m-d', strtotime('+2 day'))?>" id="arrival" name="dtearrival" placeholder="Date" data-role="datebox" data-options='{"mode":"calbox","defaultValue":"<?=date('Y-m-d', strtotime('+2 day'))?>","minDays":2,"applyMinMax":true,"themeDateToday":"c","closeCallback":"verificafecha","popupPosition":"window","useInline":false,"useFocus":true,"overrideDateFormat":"%d-%m-%Y","afterToday":true,"notToday":true}' type="text" readonly="readonly">	
		     <?}else{?>
		     <input required class=" etiqueta" type="text" min="<?=date('Y-m-d', strtotime('+2 day'))?>" id="arrival" name="dtearrival" placeholder="Date" data-role="datebox" data-options='{"mode":"calbox","defaultValue":"<?=date('Y-m-d', strtotime('+2 day'))?>","minDays":2,"applyMinMax":true,"themeDateToday":"c","useLang":"en","closeCallback":"verificafecha","popupPosition":"window","useInline":false,"useFocus":true,"overrideDateFormat":"%m-%d-%Y","afterToday":true,"notToday":true}' type="text" readonly="readonly">
		     <?}?>
		  </div>
		</form>	

		  <div class=" col-xs-12 col-sm-4 col-md-2">
		  	<label for=""></label>
		  	<label for=""><br></label>
		  	<button data-ajax="false" style="font-family: sans-serif;" id="bntCost" class="btn btn-success">Reservar</button>
		  </div>
		<div class="row"><br></div>  
		<div class="row hide" id="dtllBookin" style="padding: 20px;">
			<div class="col-xs-12">
				<div class="col-xs-12 col-sm-4">
					<div class="col-xs-12 col-sm-7 titulo">Precio por Adulto:</div>
					<div class="col-xs-12 col-sm-5"><label class="textoCantidades" id="cstAdult"></label></div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="col-xs-12 col-sm-7 titulo">Precio por Niño:</div>
					<div class="col-xs-12 col-sm-5"><label class="textoCantidades" id="cstChild"></label></div>				
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="col-xs-12 col-sm-7 titulo">Total:</div>
					<div class="col-xs-12 col-sm-5"><label class="textoCantidades" id="cstTotal"></label></div>				
				</div>
				<div class="col-xs-12"><br></div>
				<div class="col-xs-12">
					<div class="col-xs-12 col-sm-7"></div>
					<form id="frmPago" action="/es/tour" data-ajax="false" method="post">
					<div class="col-xs-12 col-sm-5"><button class="btn btn-block btn-success" id="btnBook">Reservar Ahora</button></div>				
					</form>
				</div>			
			</div>
		</div>		
	</div>

</div>
