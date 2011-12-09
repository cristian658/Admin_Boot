<?php
/******************************************************************
 classe de coneccion a la base de datos
 ******************************************************************/
//classe database
class database {
	//**Atributos de la clase database
	var $db_HOST = "localhost";
	var $db_USER = "root";
	var $db_PASS = "quezada";
	var $db = "adminBoot";
	var $CONST_ERRO = "Error al conectarse a la base de datos";
	var $dbc;

	function database() {//metodo construtor
		$this -> connect_db();
	}

	//** metodos de clase database
	function connect_db() {//metodo de conexion
		$this -> dbc = mysql_connect($this -> db_HOST, $this -> db_USER, $this -> db_PASS);
		$m = mysql_select_db($this -> db, $this -> dbc);
		return ($dbc);
	}

	function delete_db($table, $id) {//borra registo de la tabla
		$tmp = "delete from $table where id='$id'";
		$sts = mysql_query($tmp, $this -> dbc) or print mysql_error($this -> CONST_ERRO);
		return ($sts);
	}

	function close_db() {//cierra la conexion de la base de datos
		mysql_close($this -> dbc);
	}

	function insert_db($campos, $valores, $tab) {//inserta datos a la base de datos
		$inicio = "INSERT INTO $tab(";
		$meio = ") VALUES (";
		$fim = ")";
		$valor = sizeof($campos);
		//verifica el numero de elementos de un array
		$strc = "";
		for($i = 0; $i <= ($valor - 1); $i++) {
			$strc .= "$campos[$i]";
			if($i != ($valor - 1)) {
				$strc .= ",";
			}
		}
		$strv = "";
		for($k = 0; $k <= ($valor - 1); $k++) {
			$strv .= "\"$valores[$k]\"";
			if($k != ($valor - 1)) {
				$strv .= ",";
			}
		}
		$insere = "$inicio$strc$meio$strv$fim";
		$this -> query_db($insere);
	}

	function query_db($sql) {//ejecuta consulta de base de datos
		return mysql_query($sql, $this -> dbc);
	}

	function reg_db($table) {//numero de registro da tabla
		$tmp = "select * from $table";
		$sts = mysql_query($tmp, $this -> dbc) or print mysql_error($CONST_ERRO);
		$num = mysql_num_rows($sts);
		return ($num);
	}

	function id_db() {// Metodo que retorna el ultimo id de un insert
		return mysql_insert_id($this -> dbc);
	}

	function affecte_db() {//retorna el numero de lineas afectadas por la ultima consulta
		$tmp = mysql_affected_rows();
		return ($tmp);
	}

	function names_db() {//devuelve el nombre del servidor de base de datos
		$tmp = mysql_num_rows($this -> dbc);
		return ($tmp);
	}

	function drop_db($db) {//eliminar una base de datos
		return mysql_drop_db($db, $this -> dbc);
	}

	function num_rows_db($query) {//numero de registros de una consulta
		$tmp = mysql_num_rows($query);
		return ($tmp);
	}

};
?> 