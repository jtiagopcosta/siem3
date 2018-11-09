<?php
function get_filmes_filtrados(){
global $result2;
include ("common/database.php"); 

$genero = $_POST['genero'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);
	
/*Definicao e execucao da query sql de consulta*/
foreach ($genero as $gen){
$query = "SELECT * FROM filmes WHERE genero LIKE '%$gen%';";
$result2 = pg_exec($conn, $query);
}

return $result2;

pg_close($conn);
}


?>