﻿<?
include("cp/r/sql.php"); 
include("cp/r/funciones.php"); 
?>

<!doctype php>

<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Cerrotech</title>
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/zigna.css" />
<link rel="stylesheet" href="js/chosen/chosen.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/vendor/modernizr.js"></script>

</head>
<body class="prueba">
  <div class="large-12 row">
    <!-- Navigation -->

    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <!-- Title Area -->

        <li class="name">
          <h1><a href="index.php"><img src="img/logo.png"></a><span class="zigna-hide-for-small">Liberá tu celular con Cerrotech!</span></h1>
        </li>
      </ul>
    </nav><!-- End Navigation -->
  </div>

<div class="large-12">
<!-- Desktop Slider -->
    <div class="row hide-for-small">
        <ul data-orbit class="orbit-container">
            <li><img src="img/slider1.jpg"></li>
            <li><img src="img/slider2.jpg"></li>
            <li><img src="img/slider3.jpg"></li>
            <li><img src="img/slider4.jpg"></li>
            <li><img src="img/slider5.jpg"></li>
            <li><img src="img/slider6.jpg"></li>				
            <li><img src="img/slider7.jpg"></li>				            
        </ul>  
    </div><!-- End Desktop Slider -->
    <!-- Mobile Header -->
    
    <div class="row">
      <div class="small-12 show-for-small">
      <img src="img/slider1.jpg"></div>
    </div><!--  -->
</div>
<br>
<div class="row">
<div class="small-12">
<h1 style="font-size:24px; padding:15px;">Seguí estos 4 simples pasos para liberar tu celular!</h1>
</div>
  <div class="large-12 columns">
    <div class="row content-wrap">
    
      <!-- Thumbnails -->

      <div class="large-3 small-6 columns text-center">
        <img class="steps-img" src="img/uno.png">
        
        <h6 class="panel text-left">
        Marca y modelo
     		<form>
        	<select id="brand">   
            	<optgroup>
                	<option value="placeholder">Seleccioná una opción</option>                
                </optgroup>   
								 <? 
													 $mt="SELECT nombre,id,precioM 
																FROM ag_marcas
																WHERE 1
																ORDER BY nombre ASC
																";
													
													$mq=mysql_query($mt);
													$mc=mysql_num_rows($mq);
													while($md=mysql_fetch_assoc($mq)){
														$marca[]=$md["nombre"];
														$mid[]=$md["id"];
													}
													
													
													$tt="	SELECT id,modelo,marcaid 
																FROM ag_telefono
																WHERE 1
																ORDER BY modelo ASC
															";
													$tq=mysql_query($tt);
													$tc=mysql_num_rows($tq);
													while($td=mysql_fetch_assoc($tq)){
														$modelo[]=$td["modelo"];
														$marcaid[]=$td["marcaid"];	
														$idtel[]=$td["id"];														
													}
														$j=0;											
                 						for($i=0;$i<$mc;$i++){
															echo '<optgroup label="'.$marca[$i].'" class="'.$j.'">';
															for($j=0;$j<$tc;$j++)
															{
																if($mid[$i]==$marcaid[$j])
																{
																	echo'<option value="'.$modelo[$j].'" class="'.$idtel[$j].'" id="'.$marcaid[$j].'">'.$modelo[$j].' </option>';
																}
															}
															echo'</optgroup>';	
														}				
									
									
                 ?>
            </select>
        </form>  
        Seleccioná la marca y el modelo de tu equipo.  
        </h6>
      </div>

      <div class="large-3 small-6 columns text-center">
        <img class="steps-img" src="img/dos.png">        
        <h6 class="panel text-left">
        Operador
         <form>
        	<select id="carrier" disabled>
				<optgroup>
          <option value="placeholder">Seleccioná una opción</option>                
         </optgroup>  
         				<? 
										$ct="SELECT id,pais,nombre AS carrier
											 FROM ag_carrier
											 WHERE 1
											 ";
									$cq=mysql_query($ct);
									$acount=0;
									$ucount=0;
									while($cd=mysql_fetch_assoc($cq)){
													if($cd["pais"]==0)
													{	
														$acount++;
														$arg[]=$cd["carrier"];
														$acarrier[]=$cd["id"];
													}
													elseif($cd["pais"]==1)
													{	 
														$ucount++;
														$usa[]=$cd["carrier"];
														$ucarrier[]=$cd["id"];
													}
									}
									
								?>                      	
                <optgroup label="Argentina">
                	<?
                  	for($i=0;$i<$acount;$i++)
										{
											echo'<option value="'.$arg[$i].'" class="'.$acarrier[$i].'">'.$arg[$i].'</option>';
										}
									?>
                	
                    
                </optgroup>
                <optgroup label="Estados Unidos">
                    	<?
                  	for($i=0;$i<$ucount;$i++)
										{
											echo'<option value="'.$usa[$i].'" class="'.$ucarrier[$i].'">'.$usa[$i].'</option>';
										}
									?>
                </optgroup>
            </select>
        </form>
        Indica que operador maneja tus llamadas (Personal, Claro, etc.)
        </h6>
      </div>

      <div class="large-3 small-6 columns text-center">
       <img class="steps-img" src="img/tres.png">
       
        <h6 class="panel text-left">
        Indicá el número IMEI de tu equipo
        <form>        	            	
        	<input id="imei" disabled type="number" name="imei" required/>           
        </form> 
        Para saber tu IMEI marcá <span style="font-size:110%; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color: rgb(120,175,83);">*#06#</span> 
        </h6>
      </div>

      <div class="large-3 small-6 columns text-center">
      <!--<h2><img class="steps-img" src="img/cuatro.png"></h2>-->
      <img class="steps-img" src="img/cuatro.png">
      
        <h6 class="panel text-left">
        Danos tu dirección de email
        <form>        	            	
        	<input id="mail" disabled type="email" name="mail" required/>           
        </form>  
        Asegurate de usar la misma dirección con la que hagas el pago.
        </h6>
      </div><!-- End Thumbnails -->
    </div>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <div class="row">
      <!-- Content -->

      <div class="large-8 small-12 columns">
        <div class="panel radius">
          <div class="row">
            <div class="large-6 small-6 columns">
              <h4>Sobre nosotros</h4>
              <hr>
<!--ahi al lado de formas de pago, donde dice listo!, la idea es poner un texto de quien es cerrotech donde estamos remarcando argentina, numero de wahts y mail para soporte, y remarcar lo facil que es liberar y listo.-->
              <h5 class="subheader">
			  Somos un equipo de profesionales dedicados al servicio técnico y liberacion de smartphones, de la manera mas segura del mercado, sin poner en riesgo tu equipo. Ubicados en Córdoba, Argentina, damos soporte a todo el pais, siendo desde una empresa, hasta clientes particulares, confiando en nosotros por nuestro trabajo profesional y transparente, algo muy importante y valorado en Argentina. 
              </h5>
            </div>

            <div class="large-6 small-6 columns">
              <p>Tenes alguna consulta? Mandanos un email o escribinos por whatsapp! Uno de nuestros tecnicos te respondera a la brevedad!<br>
    Whatsapp:5555555<br> 
	contacto@cerrotech.com<br>
	facebook.com/cerrotech<br>
	gplus<br>
	twitter</p>
            </div>
          </div>
        </div>
      </div>

      <div class="small-12 medium-6 medium-pull-3 large-4 large-pull-0 columns">
        <h4>Formas de pago</h4>
        <h5>Total $<span id="insert"></span></h5>
        <hr>
        <div class="panel radius callout" style="text-align: center">
          <form  id="mensaje" class="pedido" action="pedido.php" method="post">
        	<select id="payment" disabled name="payment">
            	<option value="placeholder">Seleccioná una opción</option>
                <option value="DineroMail">DineroMail</option>
            	<option value="MercadoPago">MercadoPago</option>
            	<option value="Paypal">Paypal</option>
            	<option value="Transferencia">Transferencia bancaria</option>
            </select>
            <input id="brandH" type="hidden" value="" name="brand">
            <input id="modelH" type="hidden" value="" name="model">
            <input id="carrierH" type="hidden" value="" name="carrier">
            <input id="paisH" type="hidden" value="" name="pais">            
            <input id="imeiH" type="hidden" value="" name="imei"> 
            <input id="mailH" type="hidden" value="" name="mail">
            <input id="preH" type="hidden" value="" name="precio">                        
            <input id="submit" disabled type="submit" value="Procesar datos y recibir instrucciones!">
           </form> 
           <div id="enviando">
             <span>Enviando</span>
           </div>
        </div>
      </div><!-- End Content -->
    </div>
  </div>
</div><!-- Footer -->

<footer class="row">
  <div class="large-12 columns">
    <hr>

    <div id="footer" class="row">
      <div class="large-12 small-12 columns">
        <p>© Copyright. Donec in tortor tellus. Phasellus sit amet est id libero fermentum pulvinar. Integer tempus tempor odio, lobortis pellentesque enim feugiat eget. Donec in tortor tellus. Phasellus sit amet est id libero fermentum pulvinar. Integer tempus tempor odio, lobortis pellentesque enim feugiat eget. Donec in tortor tellus. Phasellus sit amet est id libero fermentum pulvinar. Integer tempus tempor odio, lobortis pellentesque enim feugiat eget. Donec in tortor tellus. Phasellus sit amet est id libero fermentum pulvinar. Integer tempus tempor odio, lobortis pellentesque enim feugiat eget. Donec in tortor tellus. Phasellus sit amet est id libero fermentum pulvinar. Integer tempus tempor odio, lobortis pellentesque enim feugiat eget.</p>
      </div>

     
    </div>
  </div>
</footer>
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">
	$(document).foundation(
		'orbit', {
			bullets:false,
			navigation_arrows:false,
			animation:'slide',
			pause_on_hover:false,
			slide_number: false,
			timer_speed: 2000			
		});
    </script>
	<script>	
	var brand, carrier, imei, mail, payment,carrierid=null,telid,marcid;
	$("#brand").change(function(){
	if($("#brand").val() != "placeholder"){
	var selected = $(':selected', this);
	$("#carrier").attr("disabled", false);
	$("#modelH").val($("#brand").val());
	$("#brandH").val(selected.closest('optgroup').attr('label'));
	telid=selected.attr("class");
	marcid=selected.attr("id");
	if(carrierid!=null){
	inserthtml();
	}
	} else{
	$("#carrier").attr("disabled", true);
	}
	});
	$("#carrier").change(function(){
	var selected = $(':selected', this);
	if($("#carrier").val() != "placeholder"){
	$("#imei").attr("disabled", false);
	$("#carrierH").val($("#carrier").val());
	$("#paisH").val(selected.closest('optgroup').attr('label'));
	carrierid=selected.attr("class");
	inserthtml();
	} else{
	$("#imei").attr("disabled", true);
	}
	});
	$("#imei").change(function(){
	var len=$("#imei").val().length;
	if(len == 15){
	$("#mail").attr("disabled", false);
	$("#imeiH").val($("#imei").val());
	} else{
	$("#mail").attr("disabled", true);
	alert("Ingrese un IMEI valido");
	}
	});
	$("#mail").change(function(){
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var email=document.querySelector('[name="mail"]').value;
	
	if($("#mail").val() != "placeholder" ){
	if(!expr.test(email)){
	alert("Error: La dirección de correo " + email + " es incorrecta.");
	}else{
	$("#payment").attr("disabled", false);
	$("#mailH").val($("#mail").val());
	}
	}else{
	$("#payment").attr("disabled", true);
	}
	});
	$("#payment").change(function(){
	if($("#payment").val() != "placeholder"){
	$("#submit").attr("disabled", false);
	$("#paymentH").val($("#payment").val());	
	} else{
	$("#submit").attr("disabled", true);
	}
	
	});
	function inserthtml(){
	$.get("getprecio.php", { carrier:carrierid, tel:telid ,marca:marcid},function(data){
	$("#insert").html(data);
	$("#preH").val(data);
	});
	}
	
	$('.pedido').submit(function(event) {
	  event.preventDefault();
	  var url = $(this).attr('action');
	  var datos = $(this).serialize();
 
	  $.post(url, datos, function(resultado) {
			$('#mensaje').html(resultado);
			$( "#dialog" ).dialog({
	autoOpen: true,
	width: 400,
	buttons: [
		{
			text: "Ok",
			click: function() {
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});
	  });

	});
</script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script>

   </script>
  </body>
</html>
