<?php
// include_once('libreria_smtp.php');

// En la variable submit tenemos todos los datos de un formulario 
$submit=$_REQUEST['submit'];
// Direccion de envio obtenida del formulario, con get_option('admin_email'); obtendria el mail por defecto
$email = $_REQUEST['email'];
// Direccion email administrador:
$admin_email = get_option('admin_email');
// Envio de emails activo?
$activo = $_REQUEST['activo'];
// URL del sitio:
$url = get_site_url();
// Cabecera obligatoria:
$header = "MIME-Version: 1.0\n";
$header .= "Content-Type: text/html; charset=iso-8859-1\n";
$header .="From: NotificacionesSEO@$url";

// Mensaje del email:
$mensaje = "
<font face='verdana' size='2'>Hola $email,<br/><br/>
Este es un aviso desde $url.<br/><br/>
Simplemente te molestamos para avisarte de que hace tiempo que no escribes.<br/><br/>
Si esto es un error o no pediste recibir este email, por favor 
contacta con el <a href='mailto:$admin_email'>administrador</a> del sitio.<br/><br/>";

/*
if($submit): 
	//podemos pasar un array de direcciones de email a cuales enviar.
	$to=array('soportecabrero@gmail.com','aplicacionesweb@yopmail.com');
	//Asunto del email
	$subject='Informe de SEO blog.chavanel.es';
	//$subject=$submit['asunto'];
	//La dirección de envio del email es la de nuestro blog por lo que agregando este header podremos responder al remitente original 
	$headers = 'Reply-to: '.$submit['nombre'].' '.$submit['apellido'].' <'.$submit['email'].'>' . "\r\n";
	//El mensaje a enviar. Se puede incluir HTML si enviamos el email en modo HTML y no texto.
	$message.='Hola <br/>'; $message.='Te gusta este tutorial?';
	//Filtro para indicar que email debe ser enviado en modo HTML
	add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
	//Cambiamos el remitente del email que en Wordpress por defecto es tu email de admin
	add_filter('wp_mail_from','mqw_email_from');
	function mqw_email_from($content_type) { return 'soportecabrero@gmail.com'; }
	//Cambiamos el nombre del remitente del email que en Wordpress por defecto es "Wordpress" 
	add_filter('wp_mail_from_name','mqw_email_from');
	function mqw_email_from($name) { return 'Administrador Christian'; }
	//Por último enviamos el email
	wp_mail( $to, $subject, $message, $headers);     
endif;*/

# Función de envío del mensaje
if ($activo == true){
	mail("$email","Aviso SEO etiquetas y categorias","$mensaje","$header");
}




?>