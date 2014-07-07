<?
include("cp/r/sql.php");
include("mail.php");
  
?>
<link rel="stylesheet" href="css/email.css" />

<?	
/********************************************************************
**																																 **		
**					Para hacer funcionar el "Codigo"											 **
**					hay que truncar la tabla pedido												 **
**					y ingresar desde phpmyadmin un 												 **
**					pedido con codigo 0000000	o ejecutar								   **
**					este query																						 **			
**				  DELETE FROM `ag_pedido` WHERE codigo!=0000000					 **
**																																 **
********************************************************************/
$fDate="Y-m-d";
$fDateTime="Y-n-j H:i:s";

$hoy = date($fDate);
$ahora = date($fDateTime);

			/*
			*Selecciona el ultimo codigo ingresado a la BD
			*/
			$ct="SELECT codigo
					 FROM  `ag_pedido` 
					 ORDER BY id DESC 
					 LIMIT 1";
			$cq=mysql_query($ct);
			$cd=mysql_fetch_assoc($cq);
			/*
			*Borra la parte del codigo que contiene la fecha dejando solo el counter
			*incremeta el counter
			*/
			$count=substr($cd["codigo"],6);
			$count++;
			/*
			*Genera los primeros 4 numeros del codigo a partir de la fecha 
			*formato= yymd 
			*/
 			$codigo=str_replace("-","",$hoy);
			$codigo=substr($codigo,2);
			/*
			*concatena el codigo de 4numeros con el contador de la bd
			*/
			$codigo=$codigo.$count;
			/*
			*Recive los datos del POST
			*/
			$brand=$_POST["brand"];
			$model=$_POST["model"];
			$country=$_POST["pais"];
			$carrier=$_POST["carrier"];
			$imei=$_POST["imei"];
			$email=$_POST["mail"];
			$payment=$_POST["payment"];			
/*			


	mysql_query(
							"INSERT INTO `ag_pedido` 
							 SET `payment`  	= '$payment',
							  	 `creada`		  ='$ahora',
								   `imei`			  ='$imei',
									 `codigo`			='$codigo',
									 `email`			='$email',
									 `idtelefono`	='$model',
									 `idcarrier`	='$carrier'
	
							");
							
		
	*/	
		
			$sendTo = "ben.picone@gmail.com";
			

				
			require_once('./r/PHPMailer/class.phpmailer.php');
			


			$email= new PHPMailer;

			$email->From      = "info@cerrotech.com";
			$email->FromName  = "Cerrotech";
			$email->Subject   = 'Contacto Web: Cerrotech';
			$email->Body      = $mensaje;
			$email->isHTML(true);
			$email->AddAddress( $sendTo ,"Benjamin");
			$email->AddReplyTo("info@cerrotech.com","No-Reply");
			
			if ($_FILES) {
				$file_name = $_FILES[$name_media_field]['tmp_name'].uniqid();
				$email->AddAttachment( $_FILES[$name_media_field]['tmp_name'], $_FILES[$name_media_field]['name'] );
			}
			
			if ($email->Send()){
				echo "
							<div id='dialog' title='Basic dialog'>
  							<p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
							</div>
							 <form  id='mensaje' class='pedido' action='pedido.php' method='post'>
        				<select id='payment' disabled name='payment'>
            			<option value='placeholder'>Seleccioná una opción</option>
            		</select>
            		<input id='submit' disabled type='submit' value='Procesar datos y recibir instrucciones!'>
           		</form> 

					";
			}else {
				echo "Mailer Error: " . $email->ErrorInfo."<br>";	
			}
			


								
?>
