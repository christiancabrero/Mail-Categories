<html>
<head></head>
<body>
<div class='wrap'><h2>Configuracion de notificaciones por email</h2></div>
<h3>Última entrada de cada categoría</h3>

<!-- Loop cuenta entradas -->
<?php
require_once("comparar_fechas.php");
$primera = date('d/m/Y');

for ($i=1;$i<=1000;$i++){ // Comprueba hasta 1000 ids de catagorias

	// Muestra la última entrada de la categoria especificada:
	query_posts('cat='.$i.'&showposts=1');
	// query_posts('cat=$i&showposts=1&order_by=date&order=DESC');
	?>
	<?php while (have_posts()) : the_post(); ?>
	<?php 
	echo ("Categoria: <b>".get_cat_name($i)."</b><br/>");
	echo "Entrada: ";
	?>
	<a href="<?php the_permalink(); ?> "><?php the_title(); ?></a><br/>
	<?php 
	$fecha_post=get_the_date('d/m/Y');
	echo ("Fecha publicación: ".$fecha_post);
	
	$segunda = $fecha_post;
	echo "<br/>".'Antiguedad: '.compararFechas ($primera,$segunda).' días';

	$dias_antiguedad=compararFechas($primera,$segunda);
	$dias_aviso=get_option('form_dias');

	if($dias_antiguedad >= $dias_aviso){
	    echo "<br/><b style='color:red;'>Entrada antigua</b><br/><br/>";
	}else{
	    echo "<br/><b  style='color:green;'>Entrada actual</b><br/><br/>";
	}
	
	endwhile;
	wp_reset_query();
};
?>

<h3>Ajustes de notificaciones</h3>
<form method='post'>

	<input type='hidden' name='action' value='salvaropciones'>
	
	<!-- Nonce comprobado con un campo oculto -->
	<?php $nonce = wp_create_nonce( 'nonce-formulario' ); ?>
	<input type="hidden" name="_wpnonce" value="<?php echo $nonce; ?>"/>
	
	<table>
		<tr>
			<td>
				<label for='dias'>Notificar en:</label><br/>
				<input size='3' type='text' name='dias' id='dias' value='<?php
				$dias_correctos=intval(get_option('form_dias'));
				if ($dias_correctos==true){
					echo get_option('form_dias');
				}
				else{$error=true;}
				?>'>(dias)<br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<label for='email'>Email de reporte:</label><br/>
				<input size='30' type='text' name='email' id='email' value='<?php	
				$email_correcto=is_email(get_option('form_email'));
				if ($email_correcto==true){
					echo get_option('form_email');
				}
				else {$error=true;}
				?>'><br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<input type='checkbox' name='activo' id='activo' value='1' <?php checked( '1', get_option( 'form_activo' ) ); ?>>
				<label for='activo'>Enviar emails</label><br/><br/>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type='submit' value='Guardar'>
			</td>
		</tr>
	</table>
</form>
</body>
</html>