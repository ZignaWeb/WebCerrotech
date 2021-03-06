<?
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
          <h1><a href="index.php"><img src="img/logo.png"></a><span class="zigna-hide-for-small">Liberá tu celular en 4 simples pasos!</span></h1>
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
<div class="row" style="padding-top:15px;">
<div class="small-12">
</div>
  <div class="large-12 columns">
    <div class="row content-wrap">
    



      <!-- Thumbnails -->

      <div class="large-3 small-6 columns text-center">
        <img class="steps-img" src="img/uno.png">
        
        <h6 class="panel text-left">
        Marca y modelo
        <div class="styledBrand">
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
        </div>
        Seleccioná la marca y el modelo de tu equipo.  
        </h6>
      </div>

      <div class="large-3 small-6 columns text-center">
        <img class="steps-img" src="img/dos.png">        
        <h6 class="panel text-left">
        Operador
         <div class="styledCarrier">
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
										if($cd["pais"]==0){	
											$acount++;
											$arg[]=$cd["carrier"];
											$acarrier[]=$cd["id"];
										}
										elseif($cd["pais"]==1){	 
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
        
        </div>
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
	<!-- Pago -->
      <div class="small-12 columns">
        
        <hr>
        <div class="small-12 large-6 large-push-3 panel radius callout" style="text-align: center">
        <h4>Formas de pago</h4>
        <h5>Total $<span id="insert"></span></h5>
         <div id="enviando">
             <p>Enviando</p>
         </div>  
          <form  id="mensaje" class="pedido" action="pedido.php" method="post">
          <div class="styledPayment">
        	<select id="payment" disabled name="payment">
            	<option value="placeholder">Seleccioná una opción</option>
                <option value="DineroMail">DineroMail</option>
            	<option value="MercadoPago">MercadoPago</option>
            	<option value="Paypal">Paypal</option>
            	<option value="Transferencia">Transferencia bancaria</option>
                          
            </select>
            </div>
            <input id="brandH" type="hidden" value="" name="brand">
            <input id="modelH" type="hidden" value="" name="model">
            <input id="carrierH" type="hidden" value="" name="carrier">
            <input id="paisH" type="hidden" value="" name="pais">            
            <input id="imeiH" type="hidden" value="" name="imei"> 
            <input id="mailH" type="hidden" value="" name="mail">
            <input id="preH" type="hidden" value="" name="precio">         
            <input id="submit" disabled type="submit" value="Procesar datos y recibir instrucciones!" class="ui-button ui-state-default ui-corner-all ui-button-text-only">
           </form> 
           
        </div>
        <!-- content-->
        <div class="small-12 columns">
        <div class="panel radius">
          <div class="row">
            <div class="small-12 columns">
              <h4>Sobre nosotros</h4>
              <hr>
<!--ahi al lado de formas de pago, donde dice listo!, la idea es poner un texto de quien es cerrotech donde estamos remarcando argentina, numero de wahts y mail para soporte, y remarcar lo facil que es liberar y listo.-->
              <h5 class="subheader">
			  Somos un equipo de profesionales dedicados al servicio técnico y liberacion de smartphones, de la manera mas segura del mercado, sin poner en riesgo tu equipo. Ubicados en Córdoba, Argentina, damos soporte a todo el pais, ya sea a empresas, hasta clientes particulares, que confian en nosotros por nuestro trabajo profesional y transparente, algo muy importante y valorado en Argentina. 
              </h5>
            </div>

            <div class="small-12 columns">
              <p>Tenes alguna consulta? Mandanos un email o escribinos por whatsapp! Uno de nuestros técnicos te responderá a la brevedad!</p>
    <p class="wp">351 5 555555 </p>
	<p class="mail">contacto@cerrotech.com</p>
	<p class="fb">facebook.com/cerrotech</p>
            </div>
          </div>
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
        <p>© Copyright 2014 CERROTECH, CÓRDOBA, ARGENTINA. Cerrotech proporciona y garantiza el código de desbloqueo para tu celular. Si tu celular esta dado 
de baja, o en banda negativa, o con los intentos agotados para ingresar el código, no se reembolsará el dinero en estos casos. Si de todas maneras usted quiere el código, sera 
bajo su responsabilidad. Por estas razones, asegurate que tu equipo cumpla con estas condiciones, para que de esta manera puedas liberar tu celular exitosamente! Le recordamos 
que no trabajamos sobre equipos robados , no pierda su valioso tiempo, Cualquier ayuda que necesites utiliza nuestros medios de contacto, y en breve te responderemos!</p>
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
			animation:'fade',
			pause_on_hover:false,
			slide_number: false,
			timer_speed: 3000			
		});
    </script>
	<script>	
$(document).ready(function(e) {
  
		var brand, carrier, imei, mail, payment,carrierid=null,telid,marcid,selected,b=0,c=0,i=0,m=0,p=0;
		 $(function() {
			$( "#speed" ).selectmenu();
		});
	
		$("#brand").change(function(){
				if($("#brand").val() != "placeholder"){
					b=0;
					selected = $(':selected', this);
							$("#modelH").val($("#brand").val());
					$("#brandH").val(selected.closest('optgroup').attr('label'));
					telid=selected.attr("class");
					marcid=selected.attr("id");
					if(carrierid!=null){
						inserthtml();
					 }
					$("#carrier").attr("disabled", false);
					$(".styledBrand").addClass("selected");
				}else{
					b++;
					$(".styledBrand").addClass("selected");
					
				}
		});
		$("#carrier").change(function(){
			if($("#carrier").val() != "placeholder"){
				 c=0;
				selected = $(':selected', this);
				$("#carrierH").val($("#carrier").val());
				$("#paisH").val(selected.closest('optgroup').attr('label'));
				carrierid=selected.attr("class");
				inserthtml();
				$("#imei").attr("disabled", false);
				$(".styledCarrier").addClass("selected");
			}else{
					c++;
					$(".styledCarrier").removeClass("selected");
				}
		});
		
		$("#imei").change(function(){
		var len=$("#imei").val().length;
		if(len == 15){
				i=0;
				$("#imeiH").val($("#imei").val());
				$("#mail").attr("disabled", false);
				$("#imei").addClass("selected");
		} else{
			i++;
			$("#imei").removeClass("selected");
			alert("Ingrese un IMEI valido");
		}
		});
		
		
		$("#mail").change(function(){
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var email=document.querySelector('[name="mail"]').value;
			if($("#mail").val() != "placeholder" ){
				if(!expr.test(email)){
					 m++;
					 $("#mail").removeClass("selected");
				alert("Error: La dirección de correo " + email + " es incorrecta.");
				}else{
					m=0;
					$("#mailH").val($("#mail").val());
					 $("#payment").attr("disabled", false);
					 $("#mail").addClass("selected");
					}	
				}
		});
		
		$("#payment").change(function(){
			if($("#payment").val() != "placeholder"){
				p=0;
				$("#paymentH").val($("#payment").val());
				$("#submit").attr("disabled", false);
				$(".styledPayment").addClass("selected");
			}else{
					p++;
					$(".styledPayment").removeClass("selected");
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
			if(b==0 && c==0 && i==0 && m==0 && p==0){
				$("#enviando").fadeIn();
				var url = $(this).attr('action');
				var datos = $(this).serialize();
		 
				$.post(url, datos, function(resultado) {
					$("#enviando").fadeOut();
					$('#mensaje').html(resultado);
					$( "#dialog" ).dialog({
							autoOpen: true,
							 show: {
										effect: "blind",
										duration: 1000
										},
							hide: {
										effect: "explode",
										duration: 1000
									},
							closeOnEscape:false,
							width: 400,
							buttons: [
								{
									text: "Cerrar",
									click: function() {
										document.location.href = "http://cerrotech.com";
									}
								}
							]
						});
				});
			}else{
				alert("TODOS LOS CAMPOS SON OBLIGATORIOS")
				}
		});
		$(".ui-dialog-titlebar-close").click(function(event){
						event.preventDefault();
						document.location.href = "http://cerrotech.com";
		});
});
</script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script>

   </script>
  </body>
</html>
