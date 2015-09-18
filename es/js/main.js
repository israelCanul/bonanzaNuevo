var txtsource="";
var zonaSel=0;


function ajustar(){ // funcion para ajustar el tamaño de los sliders en diferentes resoluciones
    var alto=$("#descripcionTour").height();
    $("#galeriaEventos").css("height","auto");

    if($(window).width()<1201){
      //$("#galeriaEventos").css("height","800px;");
      if($(window).width()<801){        
        alto=300;      
        $("#owl-demo .item img").css({"margin-left":"0%","width":"100%"});
        //$("#galeriaEventos").css("height","400px");
        if($(window).width()<401){
          alto=200;      
          $("#owl-demo .item img").css({"margin-left":"0%","width":"100%"});
          //$("#galeriaEventos").css("height","auto");
        }
      }else{
         alto=500;        
        $("#owl-demo .item img").css({"margin-left":"20%","width":"60%"});
      }
    }else{
      //$("#galeriaEventos").css("height","800px");      
      $("#owl-demo .item img").css({"margin-left":"0%","width":"100%"});
    }
}

  function initialize() { // inicializar el mapa de google del sitio 

              var txtLatitud = 20.792036; 
              var txtLongitud = -86.94469029999999;
              var nombreServ = "Rancho Bonanza";

              var mapOptions = {
                  zoom: 14,
                  mapTypeControl: false,
                  center: new google.maps.LatLng(txtLatitud, txtLongitud),
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              }

              var map = new google.maps.Map(document.getElementById('mapHotel'), mapOptions);

              var image = '//cdn.lomastravel.com.mx/img/point_general.png';
              var myLatLng = new google.maps.LatLng(txtLatitud, txtLongitud);
              var beachMarker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  icon: image,
                  title: nombreServ
             });

   }
          
   
function cargarHotelesPaquetes(){// inicializar la lista de hoteles disponibles para el paquete       
            $.ajax({
            url: "/es/site/cargar_hoteles_venta", 
            type: 'post',
            dataType:'json',
            success:function(xml){
                txtsource=xml;

                $.widget("custom.MixCombo", $.ui.autocomplete, {
                    _create: function() {
                        this._super();
                        this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
                    },
                    _renderItem: function( ul, item ) {
                        return $( "<li>" )
                            .attr("data-value", item.value)
                            .data("ui-autocomplete-item", item)
                            .data("item", item)
                            .append(item.label)
                            .appendTo( ul );
                    },
                    _renderMenu:function(e,t){
                        var n=this,r="";
                        $.each(t,function(t,i){
                            if(i.categoria!=r){
                                e.append("<li class='ui-autocomplete-category ui-autocomplete-destination'>Hotels</li>");
                                r=i.categoria
                            }
                            n._renderItem(e,i);
                        });
                    }
                });

                /*$("#saliendo").autocomplete({
                 source:xml,
                 select: function( event, ui ) {
                 $("#zona").val(ui.item.data);
                 inicioBookin();
                 }
                 }); */
                var accentMap = {
                    "á": "a",
                    "é": "e",
                    "í": "i",
                    "ó": "o",
                    "ú": "u"
                };
                var normalize = function(e) {
                    for (var t = "", o = 0; o < e.length; o++) t += accentMap[e.charAt(o)] || e.charAt(o);
                    return t
                };
                $("#saliendo").MixCombo({
                    delay: 0,
                    minLength: 3,
                    source: function(e, t) {
                        var o = new RegExp($.ui.autocomplete.escapeRegex(e.term), "i");
                        t($.grep(xml, function(e) {
                            return e = e.label || e.value || e, o.test(e) || o.test(normalize(e))
                        }))
                    },
                    change: function(e, t) {

                    },
                    select: function(e, t) {
                        $("#zona").val(t.item.data)
                    }
                });
            }
          });
}

function inicioBookin(){
  $("#bntCost").removeAttr("disabled");
  $("#dtllBookin").addClass("hide");
  $("#cstAdult").html("");
  $("#cstChild").html("");
  $("#cstTotal").html("");   
}

function finBookin(){
      datos=$("#frmBookin").serialize();

        $.ajax({
            url: "/es/tour/procesa_datos", 
            type: 'post',
            data:datos,
            dataType:'json',
            success:function(jsonResponse){
              console.log(jsonResponse.booking);         
              $("#cstAdult").html("$ "+jsonResponse.booking.tarifas.tar_adult+" USD");
              $("#cstChild").html("$ "+jsonResponse.booking.tarifas.tar_child+" USD");
              $("#cstTotal").html(jsonResponse.booking.txtTotal);   
            }
        });

  $("#bntCost").attr("disabled", "disabled");
  $("#dtllBookin").removeClass("hide");


}

  function verificafecha(){
      datos="dte="+$("#arrival").val();
      $.ajax({
            url: "/es/tour/verifica_fecha", 
            type: 'post',
            data:datos,
            dataType:'html',
            success:function(dataResponse){    
              if(dataResponse==1){// si  la seleccion de fecha es fuera de algun domingo
              }else{
                alert("The tour is not available on this day");
                $("#arrival").val("");
                $("#arrival").focus();
              }                 
            }
        });
  }

$(window).resize(function(){
    ajustar();
});

$(document).ready(function(){
      google.maps.event.addDomListener(window, 'load', initialize);
      cargarHotelesPaquetes();
      $('#arrival').datebox('applyMinMax');
      $("#videoPrincipal").get(0).play();  /* video principal ['video']*/
      $("#videoPrincipal").prop('muted', true);
      ajustar(); /* funcion para ajustar imagenes y galerias ['ajustar'] */

     $(".icono").on("click",function(){
      var accion=$(this).data("sound");
      switch(accion){
        case "play": $("#play").addClass("hidden");$("#pause").removeClass("hidden");$("#videoPrincipal").get(0).play() /* video principal ['video']*/;break;
        case "pause":$("#pause").addClass("hidden");$("#play").removeClass("hidden");$("#videoPrincipal").get(0).pause();break;
        case "muted":$("#videoPrincipal").prop('muted', true);$("#mute").addClass("hidden");$("#sound").removeClass("hidden");break;
        case "sound":$("#videoPrincipal").prop('muted', false);$("#sound").addClass("hidden");$("#mute").removeClass("hidden");break;
      }
     });


     $(".etiqueta").change(function(){  
       inicioBookin();
     });

     $("#bntCost").on("click",function(){
       if ($("#saliendo").val()=="") {alert("You must select a departure hotel");$("#saliendo").focus();return;}
       if ($("#adults").val()=="") {alert("You must select an adults number");$("#adults").focus();return;}
       if ($("#departures").val()=="") {alert("You must select a departure time");$("#departures").focus();return;}
       if ($("#arrival").val()=="") {alert("You must select an arrival date");$("#arrival").focus();return;}
       finBookin();
     });
     


      $("#owl-demo").owlCarousel({     
        autoPlay : 7000,
        stopOnHover : true,
        navigation:false,
        paginationSpeed : 1000,
        goToFirstSpeed : 2000,
        singleItem : true,
        autoHeight : false,
        transitionStyle:"goDown",
        responsive:true
      });

      $(".evento").on("click",function(){ // mostrar los slides de los eventos 
        var data=$(this).data("evento");
        $(".slide").addClass("hide");
        $("#"+data).removeClass("hide");
      });
      
      $(".owl-controls").css("display","none");// QUITAR LOS CONTROLES BASICOS DEL SLIDER OWL /* LOS PUNTITOS */

});






