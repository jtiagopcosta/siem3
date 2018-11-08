<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/principal.css" type="text/css"/>
	</head>

<body>

		

		<div id="div_top">
			<h1>Cin&eacutefilos.pt</h1>
			<img src="./img/title.jpg" width="100%" height="100%">
		</div>

	<!-- menu -->

	<ul>
		<li><a class="active" href="index.php">Em destaque</a></li>
		<li><a href="filmes.php">Filmes</a></li>
		<li><a href="sobre.html">Sobre</a></li>
		<li><a href="formulario.html">Inserir</a></li>
		<li  class="barrapesquisa">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
		</li>
	</ul>


		<div class="main_div">

		<!-- primeira fila -->
		
		<div class="row">
		
		<?php 

		include_once("database/getfilmes.php");

		$result = get_filmes();	

		global $j;
		$j=0;
		while ($j < 5) { 

			$linha = pg_fetch_row($result,$j); ?>
			
			<div class="column">
					<a href="filmepag.php?id=<?=$linha[0]?>">
					<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
					<a>
			</div>
			
		<?php $j++;  } ?>
		</div>
			
			<!-- segunda fila -->
			<div class="row">
				
				
				<?php 
				
				while ($j < 10) { 

					$linha = pg_fetch_row($result,$j); ?>
					
					<div class="column">
							<a href="filmepag.php?id=<?=$linha[0]?>">
							<img  class="imagem" src="./img/<?=$linha[7]?>" width="100%">
							<a>
					</div>
					
				<?php $j++;  } ?>
			</div>
		</div>
	</body>

</html>