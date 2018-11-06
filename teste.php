<?php

include_once ("common/database.php");


$file_name = "img/john.jpg";

$img = fopen($file_name, 'r') or die("cannot read image\n");
$data = fread($img, filesize($file_name));

$es_data = pg_escape_bytea($data);
fclose($img);

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

UPDATE bike SET full_day = 10 WHERE bike_type = 'mens_hybrid';

$query = "INSERT INTO filmes(id, data) Values(6, '$es_data')";
pg_query($con, $query); 

pg_close($con); 

?>
?>