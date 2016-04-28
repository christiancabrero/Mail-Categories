=== Mail Categories ===
Contributors: https://profiles.wordpress.org/christiancabrero
Tags: categories, mail, plugin, notification, seo
Requires at least: 3.0.1
Tested up to: 4.3, 4.5.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin que realiza un informe de la ultima entrada de cada categoría y avisa por email si hace tiempo que no se publican entradas.

== Description ==

Plugin que realiza un informe de la última entrada de cada categoría. Permite configurar el tiempo en el que serán consideradas antiguas y notificar por email si no se ha escrito en el tiempo especificado.

* Contributors: Christian Cabrero
* Tags: categories, mail, plugin, notification, seo
* Requires at least: 3.0.1
* Tested up to: 4.3, 4.5.1
    
== Installation ==

1. Comprimir en zip con el nombre "mail-categories.zip" y subir a Wordpress con el administrador de plugins o introducir los >archivos en una carpeta con el nombre "mail-categories" y colocarla en la ruta de Wordpress "/wp-content/plugins/"
2. Activar el plugin desde el administrador de plugins de wordpress.
3. Aparecerá un nuevo menú bajo el menú "Ajustes" llamado "Mail Categories" para configurar el plugin.

== Frequently Asked Questions ==

= ¿Es un plugin gratuito? =

Totalmente y lo seguirá siendo.

= ¿Notifica también de etiquetas? =

No, era la idea inicial pero será implementado en próximas actualizaciones.

= ¿Permite seleccionar de que categorías notificar? =

Aún no, pero podrá ser implementado en el futuro.

== Screenshots ==

/assets/screenshot-1.png
/assets/screenshot-2.png
/assets/screenshot-3.png

== Changelog ==

= 0.9 =
* Cambio de formato del email
* Cambio de ubicación snnipet comprueba_fecha
* Capturas de pantalla

= 0.8 =
* Colores de estado en ajustes del plugin
* Elimininado checkbox categorías/etiquetas

= 0.7 =
* Añadido snnipet loop que comprueba entradas
* Limpieza de código y comentarios

= 0.6 =
* Añadida comprobación fecha actual
* Añadida comprobación fecha último post
* Guardado de opciones del formulario

= 0.5 =
* Snnipet de envío por email
* Eliminado resumen y estadisticas de entradas
* Añadidas categorías de entradas
* Añadido permalink
* Añadido titulo de entrada

= 0.4 =
* Formato de email básico
* Eliminación de librerías innecesarias
* Eliminación de snnipets innecesarios
* Cambio a menú de ajustes con icono

= 0.3 =
* Creación e instalación del plugin .zip
* Información y estadisticas de entradas
* Añadido formulario de opciones

= 0.2 =
* Instalación manual
* Submenú de ajustes
* Creación de archivo readme.txt

= 0.1 =
* Cabecera del archivo principal
* Creación de archivos principales
* Inyección de motivación

== Upgrade Notice ==

= 1.0 =
* Próxima actualización: envío de email con snnipet cron


`<?php code(); // goes in backticks ?>`