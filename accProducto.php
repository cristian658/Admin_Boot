<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Boot</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/bootstrap-alerts.js"></script>
		<?php include 'lib/lib.php';?>
		<?php
		
		if(isset($_POST['acc'])) {
			$acc = $_POST['acc'];
		}else{
			$acc = $_GET['acc'];
		}
			switch ($acc) {
				case 'add':
					$nombre = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$estado = $_POST['estado'];
					$producto = new producto('', $nombre, $descripcion, $precio, $estado);
					if($producto->validacion()) {
						//echo "Debug:::::::20<br>";
						$producto->addProducto();
						$respuesta = '<div class="alert-message success">
										<a class="close" href="#">×</a>
										<p><strong>Ingresado con Exito.</strong> Tu producto fue ingresado correctamente.</p>
									  </div>';
					} else {
						//echo "Debug:::::::27<br>";
						$respuesta = '<div class="alert-message error">
										<a class="close" href="#">×</a>
										<p><strong>Error.</strong> El campo nombre y precio son <strong>OBLIGATORIO</strong></p>
									  </div>';	
					}
					break;
				
				case 'edit':
					$id = $_GET['id'];
					$producto = new producto;
					$producto->getProducto($id);
					$texto = "Editar";
					$acc = "Update";
					break;
				case '':
					$id = $_GET['id'];
					break;
			}
			
		if($acc == ""){
			$acc = "add";
			$texto = "Agregar";
		}
			
			
		?>
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le styles -->
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
						<h2><?=$texto?> Productos</h2>
						<div id="respuesta"><?=$respuesta;?></div>
						<form method="post">
							<fieldset>
								<div class="clearfix">
									<label for="xlInput">Nombre *</label>
									<div class="input">
										<input class="xlarge" id="nombre" name="nombre" size="30" type="text" value="<?=$producto->nombre?>">
									</div>
								</div><!-- /Nombre -->
								
								<div class="clearfix">
            						<label for="textarea">Descripción</label>
            						<div class="input">
							            <textarea rows="3" name="descripcion" id="descripcion" class="xxlarge" style="width: 378px; height: 61px;"><?=$producto->nombre?></textarea>
            						</div>
          						</div><!-- /Descripcion -->
								<div class="clearfix">
									<label for="xlInput">Precio *</label>
									<div class="input">
										<input class="xlarge" id="precio" name="precio" size="30" type="text" value="<?=$producto->precio?>">
									</div>
								</div><!-- /Precio -->
								<div class="clearfix">
									<label for="xlInput">Estado</label>
									<div class="input">
										<?php if($producto->estado == 1) $ste = 'checked'; else $ste = ''; ?>
										<input type="checkbox" value="1" name="estado" id="estado" <?=$ste?>>
										<span>Activo</span>
									</div><!-- /Estado -->
                 				</div>
								<div class="clearfix">
									<div class="actions">
										<input type="submit" class="btn primary" value="Guardar">
										&nbsp;
										<button type="reset" class="btn">Cancelar</button>
									</div>
								</div>
								<input type="hidden" id="acc" name="acc" value="<?=$acc;?>" />
							</fieldset>
						</form>
					</div>
					<div class="span4">
						<h3>Acciones</h3>
						<a href="/Admin_Boot" class="btn large primary">Volver</a>
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
		<!-- /modals -->
	</body>
</html>
