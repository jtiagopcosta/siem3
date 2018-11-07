<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/filme.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>

		<div id="div_top">
				<h1>Cin&eacutefilos.pt</h1>
				<img src="./img/title.jpg" width="100%" height="100%">
		</div>

		<!-- menu -->
		<ul>
			<li><a href="index.php">Em destaque</a></li>
			<li><a class="active" href="filmes.php">Filmes</a></li>
			<li><a href="sobre.html">Sobre</a></li>
			<li><a href="formulario.html">Inserir</a></li>
			<li  class="barrapesquisa">
				<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
			</li>
        </ul>
        
        <div class="main_div">
			<?php
			
			include_once ("database/getfilmeByid.php");
			$result = get_filmeByid (); 
			$linha = pg_fetch_row($result,0);?>
			<a href="https://www.imdb.com/title/tt0120735/?ref_=nv_sr_1">
			<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
			</a>

			<div class="text_div">
			<h2><?=$linha[1]?></h2>
			<h3><?=$linha[2]?></h3>
			<h4>Realizador: <?=$linha[4]?></h4>
			<h4>Elenco: <?=$linha[3]?></h4>
			<p>Descrição: <?=$linha[5]?></p>
			</div>
			
			<div class="reviews">
				<h3>Análises</h3>
			</div>

			<div class="text_reviews">
				<h3>Análises</h3>
			</div>
            
        </div>
    </body>

</html>