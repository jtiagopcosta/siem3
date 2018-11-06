<?php

include_once ("../common/database.php");

/*Upload de imagem para o servidor */
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


/* diretório para a imagem guardada (este diretório é gravado na base de dados mais abaixo) */
$file = $_FILES['fileToUpload'];
$name = $file['name'];

$path = "../img/" . basename($name);
if (move_uploaded_file($file['tmp_name'], $path)) {
    // Move succeed.
} else {
    // Move failed. Possible duplicate?
}

/* Obtenção de dados do formulario e envio para a BD */

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$elenco = $_POST['elenco'];
$autor = $_POST['autor'];
$nacionalidade = $_POST['nacionalidade'];
$descricao = $_POST['mensagem'];

$query = "set schema 'trabalho2';";	
pg_exec($conn, $query);

$query = "INSERT INTO filmes (nome, genero, elenco, autor, nacionalidade, descrição, imagem ) VALUES ('$nome', '$genero', '$elenco', '$autor','$nacionalidade', '$descricao', '$path')";
pg_query($conn, $query);

pg_close($conn); 

/*
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?> 