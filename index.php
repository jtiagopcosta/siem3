<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/principal.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/barralateral.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

<body>
	<div >
			<ul class="barra">
				<a href="paginaregistro.html" class="registro">Registrar-se</a>
				<input class="submitlogin" type="submit" value="Sign in" />
				<li class="login"><input type="Password" name="pesquisa" placeholder="Password" class="firstbar"></li>
				<li class="login"><input type="Login" name="pesquisa" placeholder="Username" class="firstbar"></li>		
				
			</ul>
		</div>	
		

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
			<form method="POST" action="filmespesquisados.php">
				<input type="search" name="pesquisa"  placeholder="pesquisa" class="input p">
			</form>
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
		<div class="main_div">
			Utilizador:Admin<br>
			Pass:Admin
		</div>
	</body>

</html>