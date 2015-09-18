
<div class="row ">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 formatearBordeTenue">
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-8">
				<label ><span class="titulo txtTitulo">Tour :</span><span class="texto txtTexto"> <?=$varSession['booking']['txtTour']?></span></label>			
			</div>
			<div class="col-xs-12 col-sm-3">
				<label class="titulo txtTexto textoCantidades"  style="color:#920000;float:right">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></label>		
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-5">
				<label ><span class="titulo txtTitulo">Opcion : </span><span class="texto txtTexto"><?=$varSession['booking']['txtTour']?>, <?=$varSession['booking']['salida']?></span></label>			
			</div>
			<div class="col-xs-12 col-sm-4">
				<label><span class="titulo txtTitulo">Llegando : </span><span class="texto txtTexto"><?=$fechaLetras?></span></label> 		
			</div>
			<div class="col-xs-12 col-sm-3">
				<label class="titulo txtTitulo">Horario : </label><label class="texto txtTexto"><?=$varSession['booking']['departureTime']?></label>		
			</div>		
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-5">
				<label ><span class="titulo txtTitulo">Tipo : </span><span class="texto txtTexto">Individual</span></label>			
			</div>
			<div class="col-xs-12 col-sm-4">
				<label><span class="titulo txtTitulo">Adulto(s) : </span><span class="texto txtTexto"><?=$varSession['booking']['adult']?></span></label> 		
			</div>
			<div class="col-xs-12 col-sm-3">
				<label ><span class="titulo txtTitulo">Niño(s) : </span><span class="texto txtTexto"><?=$varSession['booking']['child']?></span></label>		
			</div>		
		</div>		
	</div>
	<div class="col-xs-12"><br></div>


	<div class="col-xs-12"><br></div>

	<form method="post" id="formPago" action="/es/tour/procesa_pago">	
	<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<div class="col-xs-12"><label class="titulo txtTitulo">Por favor, complete la siguiente información:</label></div>
		<div class="col-xs-12"><label class="titulo txtTitulo" style="color:#000000">Información Personal</label></div>
		<div class="col-xs-12 textoCantidades">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Nombre(s):<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="text" name="nombre" id="nombre" class="form-control"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Apellido(s):<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="apellido" id="apellido" class="form-control"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Correo:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="email" name="email" id="email1" class="form-control"></div>
				</div>
				<!-- <div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Comfirm e-mail:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="email"  id="email2" class="form-control"></div>
				</div> -->
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">País:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <select required name="pais" id="pais" class="form-control"><? Yii::app()->GenericFunctions->cargarPais(); ?></select></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Estado:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="estado" id="estado" class="form-control"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Dirección:</div>
					<div class="col-xs-12 col-sm-8"><input type="text" name="address" id="address" class="form-control"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Teléfono:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="tel" name="phone" id="hPhone" class="form-control solo-numeros"><span style="font-size:9px;">Include area code</span></div>
				</div>				
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Comentarios:</div>
					<div class="col-xs-12 col-sm-8"><textarea name="comments" id="comments" class="form-control"></textarea></div>
				</div>				
			</div>			
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12"><label class="titulo txtTitulo"><?=$varSession['booking']['txtTour']?>, <?=$varSession['booking']['salida']?></label></div>
		<div class="col-xs-12"><label class="titulo txtTitulo" style="color:#000000">Passenger(s) Name(s)</label></div>
		<div class="col-xs-12 textoCantidades">
		<? for ($i=1; $i <= $varSession['booking']['adult'] ; $i++) { ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Adulto <?=$i?>:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="adult_<?=$i?>" id="adult_<?=$i?>" class="form-control"></div>
				</div>
			</div>
		<? } ?>

		<? for ($i=1; $i <= $varSession['booking']['child'] ; $i++) { ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Niño <?=$i?>:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="child_<?=$i?>" id="child_<?=$i?>" class="form-control"></div>
				</div>
			</div>
		<? } ?>				
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12"><label class="titulo txtTitulo" style="color:#000000">Información de Pago</label></div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12 textoCantidades">
			<!-- <div class="col-xs-12">
			<p style="color:#000;text-align:justify !important;">
			<strong style="padding:0" class="titulo">Important notice:</strong><br> 
			To ensure the security of online transactions, it will be necessary to present the credit card used to make the reservation and an official identification of the cardholder when taking the service.
			<br><br>
			Due to the number of fraudulent transactions detected and to prevent misuse of credit cards, all customers booking with a credit card that is not under  their name, must submit a copy of this credit card, duly signed by the cardholder when taking the booked services.
			<br><br>
			Failure to comply with the above provisions may be grounds to deny the services booked.
			</p>
			</div> -->
			<div class="col-xs-12"><br></div>

		  	<!-- Descripcion de las formas de pago  -->
			<div class="col-xs-12" style="color:#920000;border: 1px solid rgba(0,0,0,0.2);border-radius: 10px;">
			<div class="row"><br></div>	
			<? if(Yii::app()->language=='es' && Yii::app()->params['Moneda']=='MXN'){ ?>
				<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6 titulo txtTexto textoCantidades"><label style="color:#000000">Formas de Pago</label></div>
				<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6">
				    <input type="radio" checked="checked" name="cant_pagos" value="santander_1">
				    <label class="detalleCant">Un sólo pago</label></div><div class="col-xs-12 col-sm-4 col-md-2 cant"><label>$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?>
					<? if(Yii::app()->params['Moneda']!='MXN'){ ?><label><span class="cant">(Total MXN: $<?=$varSession['booking']['total']*$varSession['booking']['tipoCambio'];?>)</span></label>
					<? }else{ ?><label><span class="cant">(Total USD: $<?=$varSession['booking']['totalUSD'];?>)</span></label><? } ?>
					</label>
				</div>
				
				<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6"><input type="radio" name="cant_pagos" value="santander_3"><label class="detalleCant">3 Mensualidades Sin Intereses</label></div><div class="col-xs-12 col-sm-4 col-md-2 cant"><label>$<?=round(($varSession['booking']['total']/3),2)." ".$varSession['booking']['moneda'];?></label></div>
				<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6"><input type="radio" name="cant_pagos" value="santander_6"><label class="detalleCant">6 Mensualidades Sin Intereses</label></div><div class="col-xs-12 col-sm-4 col-md-2 cant"><label>$<?=round(($varSession['booking']['total']/6),2)." ".$varSession['booking']['moneda'];?></label></div>
			     
			<? }else{ ?>
				
					<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6">
						<!-- Se desvia aqui el pago si es en dolares no importa la pagina O si el pago es en pesos pero la pagina es en dolares  -->
						<!-- para cambios de pagina se debe de cambiar el texto de "Total to pay"  -->
					    <label class="titulo txtTitulo">Total a pagar: </label></div><div class="col-xs-12 col-sm-4 col-md-2 titulo txtTexto textoCantidades"><label style="color:#920000">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></label>
						<? if(Yii::app()->params['Moneda']!='MXN'){ ?><label><span class="cant">(Total MXN: $<?=$varSession['booking']['total']*$varSession['booking']['tipoCambio'];?>)</span></label>
						<? }else{ ?><label><span class="cant">(Total USD: $<?=$varSession['booking']['totalUSD'];?>)</span></label><? } ?>
						
					</div>
				
			<? } ?>
			<div class="col-xs-12"><br></div>
			</div>
			<!-- descripcion de las formas de pago  -->

			<div class="col-xs-12"><br></div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Tarjetahabiente:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text"  name="card_name" id="card_name" class="form-control solo-letras"></div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Mes de expiración:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8">
						<select required id="card_month" name="card_month" class="form-control" required>
							<option value="">Mes</option>
							<? for ($i=1; $i <= 12 ; $i++) { 
								echo "<option value=".$i.">".$i."</option>";
							} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Número de tarjeta:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" maxlength="16"  name="card_number" id="card_number" class="form-control solo-numeros"></div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Año de expiración:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8">
						<select required id="card_year" name="card_year" class="form-control" required>
							<option value="">Año</option>
							<? for ($i=15; $i <= 25 ; $i++) { 
								echo "<option value=".$i.">".$i."</option>";
							} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Tipo de tarjeta:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> 
					<select required name="card_type" id="card_type" class="form-control">
						<option value="V">Visa</option>
						<option value="MC">Mastercard</option>
					</select>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="col-xs-12 col-sm-4">Código de seguridad:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required maxlength="3" type="password" name="card_code" id="card_code" class="form-control solo-numeros"></div>
				</div>
			</div>
			<div class="col-xs-12"><br></div>												
		</div>
		<div class="col-xs-12 titulo txtTexto">
					<p>
						<input required type="checkbox" id="chkPoliticas" name="chkPoliticas" value="1"> He leído y estoy de acuerdo con las <a data-toggle="modal" data-target="#myModal">políticas de reservación</a>
					</p>
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12" ><button class="btn btn-success btn-lg" id="btnEnviar" style="float:right">Enviar</button></div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12"><br></div>								
	</div>
	</form>			
	
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

			<h1>Política de Privacidad y Seguridad</h1>
			<div class="espaciado"></div>
			<p class="infolistado">Lomas Travel tiene un compromiso de respeto a la privacidad de todos sus clientes, y en el caso de esta página, a todos los que realizan sus reservaciones en línea. Para garantizar la seguridad de sus operaciones en línea, utilizamos en nuestro sitio web el certificado VeriSign certifícate SSL 3.0, el cual protege los datos que envía de su navegador a nuestro sitio y base de datos. Toda la información relativa a las transacciones que realice con su tarjeta de crédito es encriptada, salvaguardando así su privacidad y seguridad.</p>
			<div class="espaciado"></div>
			<p class="infolistado">Toda la información que proporcionan los clientes a Lomas Travel (DBA Viajes Turquesa del Caribe Mexicano, SA de CV), tal como nombre, dirección, correo electrónico, teléfono y otros datos acerca de la reserva durante los procesos de pago en línea, será tratada de manera estrictamente confidencial, salvo que se especifique lo contrario a los clientes.</p>
			
			<div class="espaciado"></div>
			<h1>Políticas de Cancelación de Excursiones:</h1>
			<div class="espaciado"></div>
			<ol class="politicas_cancelacion">
				<li>
                            Se otorgará el reembolso del servicio:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cuando el servicio sea cancelado por el proveedor.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Debido a enfermedad, presentando un reporte médico.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Las Cancelaciones o cambios de fecha sean hechas antes de las 11:00 a.m del día anterior al servicio.

                       </li>   
                       <li>
                            No se darán reembolsos en los siguientes casos:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Si el cliente no se presenta en la fecha y hora del servicio.
                       </li>   
			</ol>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>			