<?php
/**
 *
 */
class producto {

	var $id;
	var $nombre;
	var $descripcion;
	var $precio;
	var $estado;
	var $cnx;
	var $tab = "producto";
	var $acc = TRUE;

	function __construct($id = '', $nombre = '', $descripcion = '', $precio = '', $estado = '') {
		$this -> id = $id;
		$this -> nombre = $nombre;
		$this -> descripcion = $descripcion;
		$this -> precio = $precio;
		$this -> estado = $estado;
	}

	public function getId() {
		return $this -> id;
	}

	public function getNombre() {
		return $this -> nombre;
	}

	public function getDescripcion() {
		return $this -> descripcion;
	}

	public function getPrecio() {
		return $this -> precio;
	}

	public function getEstado() {
		if($this -> estado == 1)
			return "Activo";
		else 
			return "No Activo";
		
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function setNombre($nombre) {
		$this -> nombre = $nombre;
	}

	public function setDescripcion($descripcion) {
		$this -> descripcion = $descripcion;
	}

	public function setPrecio($precio) {
		$this -> precio = $precio;
	}

	public function setEstado($estado) {
		$this -> estado = $estado;
	}
	public function getProducto($id) {
		$cnx = new database();
		$result = $cnx->query_db("SELECT nombre, descripcion, precio, estado FROM $this->tab WHERE id = $id");
		if($row = mysql_fetch_array($result)){
			$this->id = $id;
			$this->nombre = $row["nombre"];
			$this->descripcion = $row["descripcion"];
			$this->precio = $row["precio"];
			$this->estado = $row["estado"];
		}
		$cnx->close_db();
	}
	public function addProducto() {
		$cnx = new database();
		$campos = array("nombre", "descripcion", "precio", "estado");
		$valores = array("$this->nombre", "$this->descripcion", "$this->precio", "$this->estado");
		$cnx -> insert_db($campos, $valores, $this -> tab);
		$this->setId($cnx -> id_db());
		$cnx->close_db();
	}
	public function delProducto($id = "") {
		if($id != "")
			$this->id = $id;
		$cnx = new database();
		$this->acc = $cnx->delete_db($this->tab, $this->id);
		$cnx->close_db();
		return $this->acc;
		
	}
	public function editProducto() {
		$cnx = new database();
		$this->acc = $cnx->query_db("UPDATE $this->tab SET nombre = '$this->nombre', descripcion = '$this->descripcion', 
									precio = '$this->precio', estado = '$this->estado' WHERE id = $this->id");
		$cnx->close_db();
		return $this->acc;
		
	}
	public function getProductos() {
		$productos = array();
		$cnx = new database();
		$query = "SELECT id, nombre, descripcion, precio, estado FROM $this->tab";
		$result = $cnx->query_db($query);		
		while ($row = mysql_fetch_array($result)) {
			$productos[] = new producto($row["id"],$row["nombre"],$row["descripcion"],$row["precio"],$row["estado"]);
		}
		$cnx->close_db();
		return $productos;
	}
	public function validacion() {
		if($this->nombre != "" || $this->precio != "")
			$acc = TRUE;
		else
			$acc = FALSE;
		
		return $acc;
	}

}
?>