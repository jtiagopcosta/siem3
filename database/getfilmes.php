<?php
function get_filmes() {

include_once ("common/database.php");

/*Definicao e execucao da query para seleção da bdd*/
$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);
	
/*Definicao e execucao da query sql de consulta*/
$query = "select * from filmes;";
$result = pg_exec($conn, $query);

return $result;
pg_close($conn);
}

?>