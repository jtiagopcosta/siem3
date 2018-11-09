<?php
function get_filmes_pesquisados(){
include ("common/database.php"); 

$pesquisa = $_POST['pesquisa'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);
	
/*Definicao e execucao da query sql de consulta*/

$query = "SELECT * FROM filmes WHERE nome ILIKE '%$pesquisa%'
                                OR nome ILIKE '$pesquisa'
                                OR nome ILIKE '$pesquisa%'
                                OR nome ILIKE '%$pesquisa';";
$result3 = pg_exec($conn, $query);

return $result3;

pg_close($conn);
}


?>