<?php
/*
Plugin Name: Mail Categories
Plugin URI: https://github.com/christiancabrero/Mail-Categories
Description: Plugin que realiza un informe de la ultima entrada de cada categoría y avisa por email si hace tiempo que no se publican entradas.
Author: Christian Cabrero
Author URI: http://cabrero.ch
Version: 1.0
License: GPLv2
*/
if ( ! defined( 'ABSPATH' ) ) exit;

/* función que pinta el menú debajo de ajustes*/
function mc_menu_ajustes(){
    add_menu_page( 
    	'Mail Categories', //título de la página
    	'Mail Categories', //título del menú
    	'activate_plugins', //capability
    	'ajustes-mail-categories', //slug cambiar por read para pintar dentro de ajustes
    	'mc_pagina_opciones', //función que se ejecutará para pintar el contenido
    	'dashicons-email-alt', //icono interno WP: https://developer.wordpress.org/resource/dashicons
    	80 //posicion: 5,10,15,20,25,60,65,70,75,80,100
    );
}

require_once("comparar_fechas.php"); // Incluye la funcion que compara fechas

/* acción para añadir la opción de nuestro plugin al menú */
add_action('admin_menu','mc_menu_ajustes');
function mc_pagina_opciones(){	
	
	if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
		
		// Nonce que verifica si el token es correcto
		$nonce = $_POST['_wpnonce'];
		// Si el nonce no es correcto mostramos error
		if ( ! wp_verify_nonce( $nonce, 'nonce-formulario' ) ){
		  die( 'Nonce no válido, su token ha caducado.<br/>Vuelva a intentarlo o pruebe con otro usuario.' );
		}
		
		update_option('form_dias',$_POST['dias']);
		update_option('form_email',$_POST['email']);
		update_option('form_activo',$_POST['activo']);
		echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
	}
	/*
	if (isset($_POST['action']) && $_POST['action'] == "error"){
		echo("<div class='error message' style='padding: 10px'>Datos erróneos, por favor revise que sean correctos.</div>");
	}
	/* Snippets php pagina de ajustes y para enviar email */
	
	require_once("ajustes_plugin.php");	
	require_once("enviar_email.php");
}	



/* Cron que comprueba cada dia */

// Conversion dias a segundos
//$tiempo = get_option('form_dias');
//$intervalo = $tiempo * 86400;

/* Intervalo personalizado
add_filter( 'cron_schedules', 'cada_minuto' );
function cada_minuto( $schedules ) {
$schedules['porminuto'] = array(
'interval' => 60, // valor en segundos: 60, 120... o $intervalo
'display' => __( 'Cada minuto' )
);
return $schedules;
}*/


register_activation_hook( __FILE__, 'mc_activar_cron' ); //Función a ejecutar cuando se activa el plugin
register_deactivation_hook( __FILE__, 'mc_desactivar_cron' ); //Función a ejecutar cuando se desactiva el plugin

function mc_activar_cron() {
wp_schedule_event( time(), 'daily', 'hook_cron_mc' ); // 'porminuto' para comprobar cada minuto o por intervalo
}

function mc_desactivar_cron() {
wp_clear_scheduled_hook( 'hook_cron_mc' );
}

add_action( 'hook_cron_mc', 'mc_mail_cron' );
function mc_mail_cron() {
	$activo=get_option('form_activo');
	$primera = date('d/m/Y');// Fecha de hoy
	$url = get_site_url();
	$email = get_option( 'form_email' );
	
	for ($i=1;$i<=10;$i++){
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
	
}