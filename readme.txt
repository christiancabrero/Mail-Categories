=== Mail Categories === 
Contributors: https://profiles.wordpress.org/christiancabrero 
Tags: categories, mail, plugin, notification, seo 
Requires at least: 3.0.1 
Tested up to: 4.3, 4.5.1 
Stable tag: 4.3 
License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
 
Plugin que realiza un informe de la ultima entrada de cada categor�a y avisa por email si hace tiempo que no se publican entradas. 
 
== Description == 
 
Plugin que realiza un informe de la �ltima entrada de cada categor�a. Permite configurar el tiempo en el que ser�n consideradas antiguas y notificar por email si no se ha escrito en el tiempo especificado. 
 
* Contributors: Christian Cabrero 
* Tags: categories, mail, plugin, notification, seo 
* Requires at least: 3.0.1 
* Tested up to: 4.3, 4.5.1 
     
== Installation == 
 
1. Comprimir en zip con el nombre "mail-categories.zip" y subir a Wordpress con el administrador de plugins o introducir los >archivos en una carpeta con el nombre "mail-categories" y colocarla en la ruta de Wordpress "/wp-content/plugins/" 
2. Activar el plugin desde el administrador de plugins de wordpress. 
3. Aparecer� un nuevo men� bajo el men� "Ajustes" llamado "Mail Categories" para configurar el plugin. 
 
== Frequently Asked Questions == 
 
= �Es un plugin gratuito? = 
 
Totalmente y lo seguir� siendo. 
 
= �Notifica tambi�n de etiquetas? = 
 
No, era la idea inicial pero ser� implementado en pr�ximas actualizaciones. 
 
= �Permite seleccionar de que categor�as notificar? = 
 
A�n no, pero podr� ser implementado en el futuro. 
 
== Screenshots == 
 
/assets/screenshot-1.png 
/assets/screenshot-2.png 
/assets/screenshot-3.png 
 
== Changelog == 

= 1.0 =

* Comprobaci�n y limpieza de formulario (sanitize)
* Acceso directo protegido (abspath)* Nonces formulario
* Cron que comprueba cada d�a (si hay visitas)
 
= 0.9 = 
* Cambio de formato del email 
* Cambio de ubicaci�n snnipet comprueba_fecha 
* Capturas de pantalla 
 
= 0.8 = 
* Colores de estado en ajustes del plugin 
* Elimininado checkbox categor�as/etiquetas 
 
= 0.7 = 
* A�adido snnipet loop que comprueba entradas 
* Limpieza de c�digo y comentarios 
 
= 0.6 = 
* A�adida comprobaci�n fecha actual 
* A�adida comprobaci�n fecha �ltimo post 
* Guardado de opciones del formulario 
 
= 0.5 = 
* Snnipet de env�o por email 
* Eliminado resumen y estadisticas de entradas 
* A�adidas categor�as de entradas 
* A�adido permalink 
* A�adido titulo de entrada 
 
= 0.4 = 
* Formato de email b�sico 
* Eliminaci�n de librer�as innecesarias 
* Eliminaci�n de snnipets innecesarios 
* Cambio a men� de ajustes con icono 
 
= 0.3 = 
* Creaci�n e instalaci�n del plugin .zip 
* Informaci�n y estadisticas de entradas 
* A�adido formulario de opciones 
 
= 0.2 = 
* Instalaci�n manual 
* Submen� de ajustes 
* Creaci�n de archivo readme.txt 
 
= 0.1 = 
* Cabecera del archivo principal 
* Creaci�n de archivos principales 
* Inyecci�n de motivaci�n 
 
== Upgrade Notice == 
 
= 1.1 = 
* Cron real o soluci�n a visita diaria
* Comprobaci�n de id's ilimitados o seleccionables
* Reaorganizaci�n de c�digo 
 
 
`<?php code(); // goes in backticks ?>`
