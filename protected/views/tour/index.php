
<div class="row ">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 formatearBordeTenue">
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-8">
				<label ><span class="titulo txtTitulo">Tours :</span><span class="texto txtTexto"> <?=$varSession['booking']['txtTour']?></span></label>			
			</div>
			<div class="col-xs-12 col-sm-3">
				<label class="titulo txtTexto textoCantidades"  style="color:#920000;float:right">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></label>		
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-5">
				<label ><span class="titulo txtTitulo">Option : </span><span class="texto txtTexto"><?=$varSession['booking']['txtTour']?>, <?=$varSession['booking']['salida']?></span></label>			
			</div>
			<div class="col-xs-12 col-sm-4">
				<label><span class="titulo txtTitulo">Date : </span><span class="texto txtTexto"><?=$fechaLetras?></span></label> 		
			</div>
			<div class="col-xs-12 col-sm-3">
				<label class="titulo txtTitulo">Departure : </label><label class="texto txtTexto"><?=$varSession['booking']['departureTime']?></label>		
			</div>		
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12 col-sm-5">
				<label ><span class="titulo txtTitulo">Type : </span><span class="texto txtTexto">Individual</span></label>			
			</div>
			<div class="col-xs-12 col-sm-4">
				<label><span class="titulo txtTitulo">Adult(s) : </span><span class="texto txtTexto"><?=$varSession['booking']['adult']?></span></label> 		
			</div>
			<div class="col-xs-12 col-sm-3">
				<label ><span class="titulo txtTitulo">Child(s) : </span><span class="texto txtTexto"><?=$varSession['booking']['child']?></span></label>		
			</div>		
		</div>		
	</div>
	<div class="col-xs-12"><br></div>


	<div class="col-xs-12"><br></div>

	<form method="post" id="formPago" action="tour/procesa_pago">	
	<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<div class="col-xs-12"><label class="titulo txtTitulo">Please, complete the following information:</label></div>
		<div class="col-xs-12"><label class="titulo txtTitulo" style="color:#0d8c8f">Personal Information</label></div>
		<div class="col-xs-12 textoCantidades">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Name(s):<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="text" name="nombre" id="nombre" class="form-control"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Surnames(s):<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="apellido" id="apellido" class="form-control"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Email:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="email" name="email" id="email1" class="form-control"></div>
				</div>
				<!-- <div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Comfirm e-mail:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="email"  id="email2" class="form-control"></div>
				</div> -->
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Country:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <select required name="pais" id="pais" class="form-control"><? Yii::app()->GenericFunctions->cargarPais(); ?></select></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">State:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="estado" id="estado" class="form-control"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Address:</div>
					<div class="col-xs-12 col-sm-8"><input type="text" name="address" id="address" class="form-control"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Phone:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> <input required type="tel" name="phone" id="hPhone" class="form-control solo-numeros"><span style="font-size:9px;">Include area code</span></div>
				</div>				
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Comments:</div>
					<div class="col-xs-12 col-sm-8"><textarea name="comments" id="comments" class="form-control"></textarea></div>
				</div>				
			</div>			
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12"><label class="titulo txtTitulo">Bonanza Jungle Horseback Ride, <?=$varSession['booking']['salida']?></label></div>
		<div class="col-xs-12"><label class="titulo txtTitulo" style="color:#0d8c8f">Passenger(s) Name(s)</label></div>
		<div class="col-xs-12 textoCantidades">
		<? for ($i=1; $i <= $varSession['booking']['adult'] ; $i++) { ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Adult <?=$i?>:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="adult_<?=$i?>" id="adult_<?=$i?>" class="form-control"></div>
				</div>
			</div>
		<? } ?>

		<? for ($i=1; $i <= $varSession['booking']['child'] ; $i++) { ?>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Child <?=$i?>:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" name="child_<?=$i?>" id="child_<?=$i?>" class="form-control"></div>
				</div>
			</div>
		<? } ?>				
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12"><label class="titulo txtTitulo">Payment information</label></div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12 textoCantidades">
			<div class="col-xs-12">
			<p style="color:#000;text-align:justify !important;">
			<strong style="padding:0" class="titulo">Important notice:</strong><br> 
			To ensure the security of online transactions, it will be necessary to present the credit card used to make the reservation and an official identification of the cardholder when taking the service.
			<br><br>
			Due to the number of fraudulent transactions detected and to prevent misuse of credit cards, all customers booking with a credit card that is not under  their name, must submit a copy of this credit card, duly signed by the cardholder when taking the booked services.
			<br><br>
			Failure to comply with the above provisions may be grounds to deny the services booked.
			</p>
			</div>
			<div class="col-xs-12"><br></div>

		  	<!-- Descripcion de las formas de pago  -->
			<div class="col-xs-12" style="color:#920000;border: 1px solid rgba(0,0,0,0.2);border-radius: 10px;">
			<div class="row"><br></div>	
			<? if(Yii::app()->language=='es' && Yii::app()->params['Moneda']=='MXN'){ ?>
				<div class="col-xs-12 col-sm-8 col-md-4 col-md-offset-6 titulo txtTexto textoCantidades"><label style="color:#0d8c8f">Formas de Pago</label></div>
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
					    <label class="titulo txtTitulo">Total to pay: </label></div><div class="col-xs-12 col-sm-4 col-md-2 titulo txtTexto textoCantidades"><label style="color:#920000">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></label>
						<? if(Yii::app()->params['Moneda']!='MXN'){ ?><label><span class="cant">(Total MXN: $<?=$varSession['booking']['total']*$varSession['booking']['tipoCambio'];?>)</span></label>
						<? }else{ ?><label><span class="cant">(Total USD: $<?=$varSession['booking']['totalUSD'];?>)</span></label><? } ?>
						
					</div>
				
			<? } ?>
			<div class="col-xs-12"><br></div>
			</div>
			<!-- descripcion de las formas de pago  -->

			<div class="col-xs-12"><br></div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Card holder name:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text"  name="card_name" id="card_name" class="form-control solo-letras"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Expiration month:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8">
						<select required id="card_month" name="card_month" class="form-control" required>
							<option value="">Month</option>
							<? for ($i=1; $i <= 12 ; $i++) { 
								echo "<option value=".$i.">".$i."</option>";
							} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Credit card number:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required type="text" maxlength="16"  name="card_number" id="card_number" class="form-control solo-numeros"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Expiration Year:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8">
						<select required id="card_year" name="card_year" class="form-control" required>
							<option value="">Year</option>
							<? for ($i=15; $i <= 25 ; $i++) { 
								echo "<option value=".$i.">".$i."</option>";
							} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Credit card type:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"> 
					<select required name="card_type" id="card_type" class="form-control">
						<option value="V">Visa</option>
						<option value="MC">Mastercard</option>
					</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-4">Security code:<span class=="obligatorio">*</span></div>
					<div class="col-xs-12 col-sm-8"><input required maxlength="3" type="password" name="card_code" id="card_code" class="form-control solo-numeros"></div>
				</div>
			</div>
			<div class="col-xs-12"><br></div>												
		</div>
		<div class="col-xs-12 col-sm-6 titulo txtTexto">
					<p>
						<input required type="checkbox" id="chkPoliticas" name="chkPoliticas" value="1"> I have read and accept the <a data-toggle="modal" data-target="#myModal">reservation policies</a>
					</p>
		</div>
		<div class="col-xs-12"><br></div>
		<div class="col-xs-12" ><button class="btn btn-success btn-lg" id="btnEnviar" style="float:right">Send</button></div>
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

			<h1>Privacy and Safety Policy</h1>
			<div class="espaciado"></div>
			<p class="infolistado">Due to the deep respect and commitment with our customer's privacy and with those people using this online reservation services, Lomas Travel has set up a safety system VeriSign Certificate SSL 3.0 to protect all the information sent by your browser to our website and data base. All the data provided by our customers regarding the operations done with our customer's credit card are encrypted, so nobody can access our network, as a result having 100% safe transactions when processing online payments.</p>
			<div class="espaciado"></div>
			<p class="infolistado">All the information (such as name, address, e-mail address, telephone number and other data regarding the reservation) provided by our customers to Lomas Travel (DBA Viajes Turquesa del Caribe Mexicano, S.A. de C.V., and/or Caribbean Coast Reservations , Inc.) when processing online payments will be strictly confidential unless specified otherwise to our customers.</p>
			
			<div class="espaciado"></div>
			<h1>Tours Cancellation Policies:</h1>
			<div class="espaciado"></div>
			<ol class="politicas_cancelacion">
				<li>
                            Full refund will apply in the following cases:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- When the service is canceled by the supplier.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Due to illness, presenting a doctor´s report.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- The Cancellation or date change is made prior to 11:00 am the day before the service.

                       </li>   
                       <li>
                            No refunds will apply:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- If the client does not show on the date and time of service.
                       </li>   
			</ol>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>			