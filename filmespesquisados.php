<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/sec.css" type="text/css"/>
		<link rel="stylesheet"  href="css/paginas.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/barralateral.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>

	<div>
		<ul class="barra">
			<form method="POST">	
				<a href="cadastro.php" class="registro">Registrar-se</a>
				<input class="submitlogin" type="submit" value="Sign in" />
				<li class="login"><input type="Password" name="senha" placeholder="Password" class="firstbar"></li>
				<li class="login"><input type="Login" name="email" placeholder="Username" class="firstbar"></li>
			</form>			
		</ul>
		</div>

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
				<form method="POST" action="filmespesquisados.php">
				<input type="search" name="pesquisa"  placeholder="pesquisa" class="input p">
				</form>
			</li>
		</ul>
		
	<!--FILTROS-->

		<div class="sec_div">

			<h2 class="subh2">Géneros</h2>

			<?php
			
			include_once ("database/getfilmes.php"); 
			$j=0;
			global $result ;
			$result = get_filmes();	
			global $numfilmes;
			$numfilmes = pg_numrows($result);
			
			/* extrair todos os géneros */
			while($j < $numfilmes) {
				$linha = pg_fetch_row ($result,$j);
				$linhas[]=$linha[2];
				$j++;
			  }

			/* Tendo em conta que na base de dados os géneros de cada filme estão separados por
			virgulas é necessário separa-los.  É também preciso eliminar os espaços. Apos isto 
			é criado um array com todos os generos existentes, se repetir nenhum*/

			$generos = array();
 			foreach ($linhas as $genero){
				$arr = explode(',', $genero);
				 
    			foreach($arr as $linhas){ if(trim($linhas) != '')
         			$generos[] = trim($linhas);
         		}
    		 }
     		$input = array();
			$input = array_unique($generos);
			?>
			<form action="filmesfiltrados.php" method = "post"> <?php
			/*gerar a lista de géneros existentes*/ 
			 foreach ($input as $genero){?>
				
					<input type="checkbox" name="genero[]" id="genero" value="<?=$genero?>"/><?=$genero?><br>
			<?php  } ?>
			<input class="submit" type="submit" value="OK" name="pesquisar_genero">
			</form>
		</div>


		<div>

			<?php

				$k=0;
                include_once ("database/pesquisa.php");
                global $result3;
                global $numfilmes3;
                $result3 = get_filmes_pesquisados();	
                $numfilmes3 = pg_numrows($result3);
                if ($numfilmes3==0){?>
                    <div class='main_div'>
                    <h3> Nenhum resultado encontrado</h3>
                    </div><?php
                } else {
				    /*gera uma divisão para cada filme existente na base de dados*/
                    while ($k < $numfilmes3){

                        echo "<div class='main_div'>";
                        
                            $linha = pg_fetch_row($result3,$k);
                            
                            echo "<a href='filmepag.php?id=$linha[0]'>";
                            echo '<img class="movie_picture" src="./img/';
                            echo $linha[7];
                            echo '">';
                            echo "</a>";
                            echo "<h2>" .$linha[1]. "</h2>";
                            echo "<h3>" .$linha[2]. "</h3>";
                            echo "<h4>Realizador: ".$linha[4]."</h4>";
                            echo "<h4>Elenco: ".$linha[3]." </h4>";
                            //echo "<p>Descrição: " .$linha[5]." ";
                            echo "</p>";

                        echo "</div>";

                        $k ++;?>
                        <form method='POST' action='filmepag.php'>
                        <input type='hidden' name='i' value="<?php echo $i ?>">
                        <input type='hidden' name='arrayid' value="<?php echo htmlentities(serialize($id_f)); ?>" /> 
                        </form><?php
                    }	
                }
			?>
		</div>	
		
	</body>

</html>