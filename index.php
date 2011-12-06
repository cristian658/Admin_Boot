<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Boot</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/bootstrap-alerts.js"></script>
		<script src="js/jquery.tablesorter.min.js"></script>
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
			.content .span10,
			.content .span4 {
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
    				$("table#sortTableExample").tablesorter({ sortList: [[1,0]], headers: {3:{sorter: false}} });
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
							<a href="#about">Productos</a>
						</li>
						<li>
							<a href="#contact">Cuenta</a>
						</li>
						<li>
							<a href="#contact">Ayuda</a>
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
      					
						<table class="zebra-striped" id="sortTableExample">
					        <thead>
					          <tr>
					            <th class="header">#</th>
					            <th class="yellow header headerSortDown">Nombre</th>
					            <th class="blue header">Fecha</th>
					            <th class="green header">Acciones</th>
					          </tr>
					        </thead>
					        <tbody>
						        <tr>
						        	<td>2</td>
						            <td>Jugo</td>
						            <td>12/11/2011</td>
						            <td><button class="btn info">Editar</button> <button class="btn danger">Eliminar</button></td>
						          </tr>
						          <tr>
						            <td>1</td>
						            <td>Planchaito</td>
						            <td>12/01/2011</td>
						            <td><button class="btn info">Editar</button> <button class="btn danger">Eliminar</button></td>
						          </tr>
						          <tr>
						            <td>3</td>
						            <td>Queque</td>
						            <td>12/10/2011</td>
						            <td><button class="btn info">Editar</button> <button class="btn danger">Eliminar</button></td>
						          </tr>
					          </tbody>
      					</table>
					</div>
					<div class="span4">
						<h3>Acciones</h3>
						<a href="#" class="btn large primary">Agregar nuevo producto</a>
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
	</body>
</html>
