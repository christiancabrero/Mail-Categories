<?php
/*
Plugin Name: Mail Categories
Plugin URI: https://github.com/christiancabrero/Mail-Categories
Description: Plugin que realiza un informe de la ultima entrada de cada categoría y avisa por email si hace tiempo que no se publican entradas.
Author: Christian Cabrero
Author URI: http://cabrero.ch
Version: 0.9
License: GPLv2
*/

/* función que pinta el menú debajo de ajustes*/
function menu_fuera_ajustes(){
    add_menu_page( 
    	'Mail Categories', //título de la página
    	'Mail Categories', //título del menú
    	'activate_plugins', //capability
    	'ajustes-mail-categories', //slug cambiar por read para pintar dentro de ajustes
    	'miplugin_pagina_de_opciones', //función que se ejecutará para pintar el contenido
    	'dashicons-email-alt', //icono interno WP: https://developer.wordpress.org/resource/dashicons
    	80 //posicion: 5,10,15,20,25,60,65,70,75,80,100
    );
}
/* función que pinta el menú dentro de ajustes*/
function menu_dentro_ajustes(){
    add_options_page(
	'Titulo de la pagina',
	'Mail categories',
	'read',
	'ajustes-mail-opciones',
	'miplugin_pagina_de_opciones'
	);
}

/* acción para añadir la opción de nuestro plugin al menú */
add_action('admin_menu','menu_fuera_ajustes');

function miplugin_pagina_de_opciones(){

if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
	update_option('form_categorias',$_POST['categorias']);
	update_option('form_etiquetas',$_POST['etiquetas']);
	update_option('form_dias',$_POST['dias']);
	update_option('form_email',$_POST['email']);
	update_option('form_activo',$_POST['activo']);
	echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
}

/*Numero de categorias totales
$numcats = wp_count_terms('category');
echo ("Categorias totales: <b>$numcats</b>");
echo ("<br/>");*/

/*Numero de post por categoria
$chosen_id = 1; // category number
$thisCat = get_category($chosen_id);
echo ("Numero de posts en la categoria ".get_cat_name( $chosen_id).": ");
echo ("<b>$thisCat->count</b>");*/

require_once("ajustes_plugin.php");
require_once("enviar_email.php");

}