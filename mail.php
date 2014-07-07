<? 
$mensaje='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>

    <link rel="stylesheet" href="zignaMail.css"> <!-- For testing only -->

    <style type="text/css">
      
h5{ color:#f00}
		p{ background:#000}
		#fondo{ width:50%;float:left; background:#C00}      
    </style>
    <style type="text/css">

      /* Your custom styles go here */

    </style>
  </head>
  <body>
    <table class="body">
      <tr>
        <td class="center" align="center" valign="top">
          <center>

<div  id="fondo">
    <h5 id="titulo">PARA CONTINUAR CON EL PEDIDO DEBES EFECTUAR EL PAGO Y REENVIAR ESTE CORREO CON
    EL COMPROBANTE ADJUNTO.</h5>
    
    
    <h5>DATOS PROCESADOS</h5>
    
    
    
    <p>Fecha de pedido: '.$ahora.'</p>
    <p>Telefono: '.$_POST["brand"].' '.$_POST["model"].'</p>
    <p>IMEI: '.$_POST["imei"].' </p>
    <p>Compania: '.$_POST["carrier"].' '.$_POST["pais"].'</p>
    <p>Email: '.$_POST["mail"].'</p>
    <p>Precio: $'.$_POST["precio"].'</p>
    <p>Forma de pago: '.$_POST["payment"].'</p>
    <p>Codigo de pedido: '.$codigo.'</p>
    
    <p>Muchas gracias!</p>
    <p>Cerrotech.</p>
  </div>
          </center>
        </td>
      </tr>
    </table>
  </body>
</html>';





?>
