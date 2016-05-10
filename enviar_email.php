<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// En la variable submit tenemos todos los datos de un formulario 
$submit = $_REQUEST['submit'];
// Direccion de envio obtenida del formulario, con get_option('admin_email'); obtendria el mail por defecto del admin
$email = sanitize_email($_REQUEST['email']);
// Direccion email administrador:
$admin_email = get_option('admin_email');
// Envio de emails activo?
$activo = $_REQUEST['activo'];
// URL del sitio:
$url = get_site_url();
// Cabecera obligatoria:
$header = "MIME-Version: 1.0\n";
$header .= "Content-Type: text/html; charset=iso-8859-1\n";
$header .="From: MailCategories@";

// Loop cuenta entradas 
// Aqui iba archivo comparar fechas

$primera = date('d/m/Y');// Fecha de hoy
for ($i=1;$i<=1000;$i++){
	query_posts('cat='.$i.'&showposts=1');// Consulta los datos de 1 post de la categoria especificada	
	while (have_posts()) : the_post();
	$fecha_post=get_the_date('d/m/Y');
	$segunda = $fecha_post;
	$dias_antiguedad=compararFechas($primera,$segunda);
	$dias_aviso=get_option('form_dias');
	// Función de envío del mensaje
	if ( ($activo == true) && ($dias_aviso == $dias_antiguedad) ){		
		$permalink=get_the_permalink();
		$titulo_post=get_the_title();
		$link_post="<a href='$permalink'>$titulo_post</a>";		
		// Mensaje del email:
		$mensaje = "<font face='verdana' size='2'>Hola $email,<br/><br/>
		Este es un aviso desde $url.<br/><br/>
		Simplemente te molestamos para avisarte de que hace tiempo que no escribes ninguna entrada en la categoría <b>"
		.get_cat_name($i)."</b>, la última entrada que escribiste fue ".$link_post." el <b>".$fecha_post."</b> hace <b>".$dias_antiguedad."</b> días.<br/><br/>
		Si has recibido este mensaje por error, por favor 
		contacta con el <a href='mailto:$admin_email'>administrador</a> del sitio.<br/><br/>";
		mail("$email","Hace tiempo que no escribes","$mensaje","$header");
	}
	endwhile;
	wp_reset_query();
};

?>