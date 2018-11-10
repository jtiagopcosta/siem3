<?php

include_once ("../common/database.php");

$idfilme = $_GET['id'];

/*Definicao e execucao da query para seleção da bdd*/
$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);
        
/*Definicao e execucao da query delete*/
$query = "DELETE  FROM filmes WHERE id = $idfilme;";
$result = pg_exec($conn, $query);


pg_close($conn);
header("Location:../filmes.php")

?>