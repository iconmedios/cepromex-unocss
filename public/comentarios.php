<?php

error_reporting(0);
header('Content-type: text/html; charset=utf-8');

//INCLUIMOAS LAS CLASES NECESARIAS PARA LOS ENVIOS DE CORREO
include("clases/class.phpmailer.php");
include("clases/class.smtp.php");

// Para el captcha
/* Agrego AIO :: 2019ene14 :: capcha version 2.0 :: Lo tuve que hacer asi, para no afectar la estructura -_- */
	$validate=0;
	$dataUrl = 'https://www.google.com/recaptcha/api/siteverify';

	$dataIn = array(
		'secret' => '6LeJp4kUAAAAAK6waxQfXJbdONXoj6WG0q4xyWfd',
		'response' => $_POST["g-recaptcha-response"],
		'remoteip' => $_SERVER['REMOTE_ADDR']
	);

	$objCheck = (object)(json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$dataIn['secret']."&response=".$dataIn['response']."&remoteip=".$dataIn['remoteIp']), true));

	if($objCheck->success == 1) {

		$validate = 1;
	}

	//print_r($objCheck);
/* fin Agrego AIO :: 2019ene14 :: capcha version 2.0 :: Lo tuve que hacer asi, para no afectar la estructura -_- */


if($validate==1){

$mailDestinatario0 = $_REQUEST['email'];
//$mailDestinatario1="liliana.alvarado@grupovisual.com.mx";
$mailDestinatario2="contacto@precisionprint.com.mx";
//$mailDestinatario2="aurelio@grupovisual.com.mx";

$nombreArchivoFinal="";
$nombreUsuario=$_REQUEST['name'];


//Enviamos sus datos al correo proporcionado
	//$varPara = $mail;
	//$varPara = "<".$mailDestinatario0.">,<".$mailDestinatario1.">,<".$mailDestinatario2.">";
	$varPara = "<".$mailDestinatario0.">,<".$mailDestinatario2.">";
	$varAsunto = "PRECISION INGENIERIA EN IMPRESION";                        //Este es el titulo del correo (Asunto)
	$varMensajeExp = "
	<font face='Arial, Helvetica, sans-serif' size='2.5'>
	PRECISI&Oacute;N INGENIER&Iacute;A EN IMPRESI&Oacute;N
	<br /><br />
	Nombre: <b>".$_POST['name']."</b><br />
	Tel&eacute;fono: <br /><b>".utf8_decode( nl2br($_REQUEST['tel']) )."</b><br />
	Correo: <br /><b>".utf8_decode( nl2br($_REQUEST['email']) )."</b><br />
	Titulo: <br /><b>".utf8_decode( nl2br($_REQUEST['subject']) )."</b><br />
	Comentario: <br /><b>".utf8_decode( nl2br($_REQUEST['message']) )."</b><br />
	</font>	";        //$notas contiene el mensaje escrito para el usuario
	$varMensajeExp="<table width='700' bordercolor='#CCCCCC' style='border:1px #CCCCCC solid;'>
				<tr>
					<td colspan='3' align='center'>
						<img src='http://precisionprint.com.mx/images/logoPrecisionPrint.png' width='300'/>
					</td>
				</tr>
				<tr>
					<td colspan='3'>
						<font face='Arial, Helvetica, sans-serif' size='3'>
							<br />
							Fecha: " . date('d-m-Y') . " " . date('H:i:s') . "
						</font>
					</td>
				</tr>
				<tr>
					<td bgcolor='#09ADEE' colspan='3' height='35' align='center'>
                    <font color='#FFFFFF' face='Arial, Helvetica, sans-serif' size='4'><b>&nbsp;FORMULARIO DE CONTACTO</b></font>
					</td>
				</tr>
				<tr>
					<td colspan='3' align='justify'>
						<br />
						<font face='Arial, Helvetica, sans-serif' size='3'>
							<center>

							Nombre de usuario: <b>" . ($_REQUEST['name']) . "</b> <br /><br />
							Teléfono: <b>" . ($_REQUEST['tel']) . "</b> <br /><br />
							Mail: <b>" . ($_REQUEST['email']) . "</b> <br /><br />
							Asunto: <b>" . ($_REQUEST['subject']) . "</b> <br /><br />
							Comentario: <b>" . ($_REQUEST['message']) . "</b> <br /><br />
							</center>
						</font>
						<br />
					</td>
				</tr>
				<tr>
					<td align='center' height='35' bgcolor='#09ADEE'>
						<font color='#FFFFFF' face='Arial, Helvetica, sans-serif' size='2'>
							&copy; " . date('Y') . " PRECISIÓN INGENIERÍA EN IMPRESIÓN
						</font>
					</td>
				</tr>
				<tr>
					<td>
					 <br />
						<font color='#666666' face='Arial, Helvetica, sans-serif' size='1'>
							Aviso: La informaci&oacute;n contenida en el presente correo es de car&aacute;cter confidencial y para uso exclusivo de la persona o instituci&oacute;n a que se refiere. Si usted no es el destinatario de este mensaje, haga caso omiso del mismo y eliminelo.
						</font>
					</td>
				</tr>
			</table>";
	
	$varContenido = "From: PRECISION INGENIERIA EN IMPRESION <webmaster@precisionprint.com.mx>\r\n";   //Esto aparece en la parte de donde se ha enviado este correo
	$varContenido .= "Reply-To: contacto@precisionprint.com.mx\r\n";    //Este es el mail a donde se envia una respuesta en caso de haberla por parte del destinatario
	//$varContenido .= "CC: ".$nombreCliente." <".$mail.">\r\n";
	$varContenido .= "MIME-Version: 1.0 encoding='utf-8'\r\n";
	$varContenido .= "Content-type: text/html; charset=utf-8\r\n"; 
	$mail->CharSet = 'UTF-8';
	mail($varPara, $varAsunto, $varMensajeExp, $varContenido);


echo "Sus datos se han enviado correctamente.";


//****** como debe ser  ****

/*$mailDestinatario=utf8_decode($_REQUEST['email']);
$nombre=utf8_decode($_REQUEST['nombre']);
//LLAMAMOS LA FUNCIÓN PARA ENVIO DE CORREO
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";

// COLOCAMOS LOS DATOS PARA LA AUTENTIFICACIÓN DE ENVIO DE CORREO
//$mail->Host = "precisionprint.com.mx";
//$mail->Port = 465;
//$mail->Username = "ingenif6_precisi";
//$mail->Password = "precision2013_";

$mail->From = "webmastero@precisionprint.com.mx";
$mail->FromName = utf8_decode("Precision Print");
$mail->Subject = utf8_decode("Comentarios desde el sitio web");

//	------------------------------------------------------------------------------------------------------------------------\n\nPor si se necesita mas adelante
//$mail1->AltBody = utf8_decode("FORMULARIO CONTACTO\n\n");

//El mismo mensaje por si admite html en el correo

$mail->MsgHTML("
		<table width='700' bordercolor='#CCCCCC' style='border:1px #CCCCCC solid;'>
				<tr>
					<td colspan='3' align='center'>
						<img src='http://www.precisionprint.org.mx/img/logoPrecisionPrint.png' width='600'/>
					</td>
				</tr>
				<tr>
					<td colspan='3'>
						<font face='Arial, Helvetica, sans-serif' size='3'>
							<br />
							Fecha: " . date('d-m-Y') . " " . date('H:i:s') . "
						</font>
					</td>
				</tr>
				<tr>
					<td bgcolor='#2f98a5' colspan='3' height='35' align='center'>
                    <font color='#FFFFFF' face='Arial, Helvetica, sans-serif' size='4'><b>&nbsp;FORMULARIO DE CONTACTO</b></font>
					</td>
				</tr>
				<tr>
					<td colspan='3' align='justify'>
						<br />
						<font face='Arial, Helvetica, sans-serif' size='3'>
							<center>

							Nombre de usuario: <b>" . utf8_decode($_REQUEST['nombre']) . "</b> <br /><br />
							Mail: <b>" . utf8_decode($_REQUEST['mail']) . "</b> <br /><br />
							Comentario: <b>" . utf8_decode($_REQUEST['comentario']) . "</b> <br /><br />
							</center>
						</font>
						<br />
					</td>
				</tr>
				<tr>
					<td align='center' height='35' bgcolor='#2f98a5'>
						<font color='#FFFFFF' face='Arial, Helvetica, sans-serif' size='2'>
							&copy; " . date('Y') . "Precision Print
						</font>
					</td>
				</tr>
				<tr>
					<td>
					 <br />
						<font color='#666666' face='Arial, Helvetica, sans-serif' size='1'>
							Aviso: La informaci&oacute;n contenida en el presente correo es de car&aacute;cter confidencial y para uso exclusivo de la persona o instituci&oacute;n a que se refiere. Si usted no es el destinatario de este mensaje, haga caso omiso del mismo y eliminelo.
						</font>
					</td>
				</tr>
			</table>
	");

//$mail->AddAddress("info@psiquiatrasapm.org.mx", "Comentarios desde el sitio web");
//Ahora colocamos el mail del destinatario

$mail->AddAddress("aurelio@grupovisual.com.mx", "Comentarios desde el sitio web");   //Enviamos el correo a la prueba

//$mail->AddAddress("aurelio@grupovisual.com.mx", "Comentarios desde el sitio web");   //Enviamos el correo a la prueba

#$mail->AddAddress("info@cmorlccc.org.mx", "Comentarios desde el sitio web");   //Enviamos el correo a la urna

$mail->AddBCC("liliana.alvarado@grupovisual.com.mx", "Comentarios desde el sitio web");   //Copia oculta
$mail->AddCC($mailDestinatario, $nombre);					     //Enviamos una copia del correo a la persona que comento

$mail->IsHTML(true);


//Este mail es para el participante
 if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
  } else {
  echo "Hemos recibido sus cometarios, gracias por ayudarnos a mejorar.";
  }
//header('Location:' . getenv('HTTP_REFERER'));
//header('Location: ../index.php');
*/
}else{
	echo "Error: No se ha completado el Captcha";
}

?>