<?php
	include '../lib/database.php';
	include '../class/producto.php';
	$id = $_POST["id"];
	$producto = new producto;
	$resultado = $producto->delProducto($id);
	
	//$producto->delProducto($id);
?>
<?php if($resultado): ?>
	<div class="alert-message success">
		<a class="close" href="#">×</a>
		<p><strong>Eliminado con Exito.</strong> Tu producto fue eliminado correctamente.<?php echo mysql_error(); ?></p>
	</div>
<?php else :?>
	<div class="alert-message error">
		<a class="close" href="#">×</a>
		<p><strong>Error!!.</strong> No se pudo eliminar Producto.</p>
	</div>	
<?php endif; ?>
<?php /*

<div class="alert-message warning">
<a class="close" href="#">×</a>
<p><strong>Advertencia!.</strong> Faltan Campos por llenar.</p>
</div>
<div class="alert-message error">
<a class="close" href="#">×</a>
<p><strong>Error.</strong> Hay problema al ingresar producto.</p>
</div>
<div class="alert-message success">
<a class="close" href="#">×</a>
<p><strong>Ingresado con Exito.</strong> Tu producto fue ingresado correctamente.</p>
</div>
<div class="alert-message info">
<a class="close" href="#">×</a>
<p><strong>Información!.</strong> Test de Información.</p>
</div>
 */
 ?>
