$(document).ready(function(){
	$('.solo-letras').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúABCDEFGHIJKLMNÑOPQRSTUVWXYZ');
    $('.solo-numeros').validCampoFranz('0123456789'); 
   	


 $("#formPago").validate({
	        rules:{},
	        messages:{},
	         }); 

$("#email2").change(function(){
	if($(this).val()!=$("#email1").val()){
		$(this).css("border-color","red");
		$(this).val("");
	}else{
		$(this).css("border-color","green");
	}
});

});