<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Boot</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<?php include 'lib/lib.php';?>
		<?php
			$productos = new producto;
			$productos = $productos -> getProductos();
		?>
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/bootstrap-alerts.js"></script>
		<script src="js/bootstrap-modal.js"></script>
		<script src="js/jquery.tablesorter.min.js"></script>
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le styles -->
		<script>
			function RemoveRow(index) {
				var parent = document.getElementById(index).parentNode;
				parent.removeChild(document.getElementById(index));
			}

			function cancelar(id) {
				$('#modal-from-dom-' + id).modal('hide');
			}

			function eliminar(id) {
				$("#respuesta").load("ajax/delProducto.php", {
					id : id
				}, function() {
					$('#modal-from-dom-' + id).modal('hide');
					RemoveRow("row-" + id);
				});
			}
		</script>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/docs.css" rel="stylesheet">
		<style type="text/css">
			/* Override some defaults */
			html, body {
				background-color: #eee;
			}
			body {
				padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
			}
			.container > footer p {
				text-align: center; /* center align it with the container */
			}
			.container {
				width: 970px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
			}
			/* The white background content wrapper */
			.container > .content {
				background-color: #fff;
				padding: 20px;
				margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
				-webkit-border-radius: 0 0 6px 6px;
				-moz-border-radius: 0 0 6px 6px;
				border-radius: 0 0 6px 6px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
				-moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
				box-shadow: 0 1px 2px rgba(0,0,0,.15);
			}
			/* Page header tweaks */
			.page-header {
				background-color: #f5f5f5;
				padding: 20px 20px 10px;
				margin: -20px -20px 20px;
			}
			/* Styles you shouldn't keep as they are for displaying this base example only */
			.content .span10, .content .span4 {
				min-height: 500px;
			}
			/* Give a quick and non-cross-browser friendly divider */
			.content .span4 {
				margin-left: 20px;
				padding-left: 19px;
				border-left: 1px solid #eee;
			}
			.topbar .btn {
				border: 0;
			}
		</style>
		<script>
			$(function() {
				$("table#sortTableExample").tablesorter({
					sortList : [[0, 0]],
					headers : {
						4 : {
							sorter : false
						}
					}
				});
				//$(".alert-message").alert('close');
			})
		</script>
	</head>
	<body>
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="/admin_boot">Admin Boot</a>
					<ul class="nav">
						<li>
							<a href="#">Inicio</a>
						</li>
						<li class="active">
							<a href="#">Productos</a>
						</li>
						<li>
							<a href="#cuenta">Cuenta</a>
						</li>
						<li>
							<a href="#ayuda">Ayuda</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="content">
				<div class="page-header">
					<h1>Admin Boot <small>Sistema de Administración</small></h1>
				</div>
				<div class="row">
					<div class="span10">
						<h2>Productos</h2>
						<div id="respuesta">
							
      					</div>
						<table class="zebra-striped" id="sortTableExample">
					        <thead>
					          <tr>
					            <th class="header">#</th>
					            <th class="yellow header headerSortDown">Nombre</th>
					            <th class="blue header">Precio</th>
					            <th class="green header">Estado</th>
					            <th class="black header">Acciones</th>
					          </tr>
					        </thead>
					        <tbody>
					        	<?php foreach ($productos as $producto): ?>
					        	<tr id="row-<?=$producto->id ?>">
						        	<td><?=$producto->id ?></td>
						            <td><?=$producto->nombre ?></td>
						            <td><?=$producto->precio ?></td>
						            <td><?=$producto->getEstado() ?></td>
						            <td>
						            	<button class="btn info" onclick="location.href='accProducto.php?acc=edit&id=<?=$producto->id?>'">Editar</button> 
						            	<button class="btn danger" data-keyboard="true" data-backdrop="true" data-controls-modal="modal-from-dom-<?=$producto->id ?>">Eliminar</button>
						            </td>
						        </tr>
					        	<?php endforeach;?>
					          </tbody>
      					</table>
					</div>
					<div class="span4">
						<h3>Acciones</h3>
						<a href="accProducto.php" class="btn large primary">Agregar nuevo producto</a>
					</div>
				</div>
			</div>
			<footer>
				<p>
					&copy; Admin Boot 2011
				</p>
			</footer>
		</div>
		<!-- /container -->
		<!-- modals -->
		<?php foreach ($productos as $producto): ?>
		<div class="modal hide fade" id="modal-from-dom-<?=$producto->id?>" style="display: none;">
			<div class="modal-header">
				<a class="close" href="#">×</a>
				<h3>Eliminar</h3>
			</div>
			<div class="modal-body">
				<p>¿ Esta seguro que quiere eliminar a <?=$producto->nombre?> ?</p>
			</div>
			<div class="modal-footer">
				<a class="btn primary" href="javascript:eliminar('<?=$producto->id?>')">Aceptar</a>
				<a class="btn secondary" href="javascript:cancelar('<?=$producto->id?>')">Cancelar</a>
			</div>
		</div>
		<?php endforeach;?>
          <!-- /modals -->
	</body>
</html>
