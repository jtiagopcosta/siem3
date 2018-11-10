 <!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/paginas.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/barralateral.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<div>
			<ul class="barra">
			<form method="POST" action="database/validacao_user.php">	
				<a href="registro.php" class="registro">Registar-se</a>
				<input class="submitlogin" type="submit" value="Sign in"/>
				<li class="login"><input type="password" name="senha"  placeholder="Password" class="firstbar"></li>
				<li class="login"><input type="text" name="nome" placeholder="Username" class="firstbar"></li>
			</form>			
			</ul>
		</div>

		<?php

		?>

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
		
	<!--FILTROS-->
		<div class="sec_div">
				<h2 class="subh2">Gêneros</h2>
					<input type="checkbox" name="filme" value="drama"/>Drama <br>
					<input type="checkbox" name="filme" value="açao">Ação<br>
					<input type="checkbox" name="filme" value="aventura">Aventura<br>
					<input type="checkbox" name="filme" value="policia">Policial<br>
					<input type="checkbox" name="filme" value="terror">Terror<br>
					<input type="checkbox" name="filme" value="comedia">Comédia<br>
					<input type="checkbox" name="filme" value="documentario">Documentário<br>
					<input type="checkbox" name="filme" value="animacao">Animação<br>
					<input type="checkbox" name="filme" value="musical">Musical<br>
					<input type="checkbox" name="filme" value="suspense">Suspense<br>
					<input type="checkbox" name="filme" value="infantil">Infantil<br>
					<input type="checkbox" name="filme" value="anime">Anime<br>
					<input type="checkbox" name="filme" value="romance">Romance<br>
					<input type="checkbox" name="filme" value="ficcao">Ficção Científica<br>
					<input class="submit" type="submit" value="Search" /><br><br>
			</div>


		<div>

			<?php
			
				include("database/getfilmes.php");

				$result = get_filmes();	
				$numfilmes = pg_numrows($result);
				
				$i=0;
				//$id_f = array();
				/*gera uma divisão para cada filme existente na base de dados*/
				while ($i < $numfilmes){

					echo "<div class='main_div'>";
					
						$linha = pg_fetch_row($result,$i);
						
						echo "<a href='filmepag.php?id=$linha[0]'>";
						echo '<img class="imagem" src="./img/';
						echo $linha[7];
						echo '">';
						//$result[]
						echo "</a>";
						echo "<h2>" .$linha[1]. "</h2>";
						echo "<h3>" .$linha[2]. "</h3>";
						echo "<h4>Realizador: ".$linha[4]."</h4>";
						echo "<h4>Elenco: ".$linha[3]." </h4>";
						//echo "<p>Descrição: " .$linha[5]." ";
						echo "</p>";

					echo "</div>";

					$i ++;?>
					<form method='POST' action='filmepag.php'>
					<input type='hidden' name='i' value="<?php echo $i ?>">
					<input type='hidden' name='arrayid' value="<?php echo htmlentities(serialize($id_f)); ?>" /> 
					</form><?php
				}

	
			
			?>
		</div>	
		
	</body>

</html>