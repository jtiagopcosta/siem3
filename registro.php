<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet"  href="css/style.css" type="text/css"/>
		<link rel="stylesheet"  href="css/paginas.css" type="text/css"/>
		<link rel="stylesheet"  href="css/login.css" type="text/css"/>
		<link rel="stylesheet"  href="css/registro.css" type="text/css"/>
	
		<link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
<body>
	<!--LOGIN-->
	<div>
		<ul class="barra">
			<a class="registro">Registrar-se</a>
		<form method="POST" action="database/validacao_user.php">
			<input class="submitlogin" type="submit" value="Sign in" />
			<li class="login"><input type="Password" name="pesquisa" placeholder="Password" class="firstbar"></li>
			<li class="login"><input type="Login" name="pesquisa" placeholder="Username" class="firstbar"></li>
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
		<li><a href="filmes.php">Filmes</a></li>
		<li><a href="sobre.html">Sobre</a></li>
		<li><a href="formulario.html">Inserir</a></li>
		<li  class="barrapesquisa">
			<input type="search" name="pesquisa" placeholder="pesquisa" class="input p">
		</li>
	</ul>
	
	<div class="div_moderador">
		<h2 class="subh2">Registro</h2>  	
	
        				
	<form method="POST" action="database/acao.php">
		
		<input type="text" name="nome" class="input" placeholder="Nome Completo" maxlength="30" >
		<input type="text" name="username" class="input"  placeholder="Nome de usuário" maxlength="30">
		<input type="text" name="email" class="input"  placeholder="E-mail" maxlength="32">
		<input type="Password" name="senha" class="input"  placeholder="Senha" maxlength="32">
		<input type="submit" class="submit" name="submit" value="cadastrar" > 
			
	</form>	
	</div>

		
</body>

</html>