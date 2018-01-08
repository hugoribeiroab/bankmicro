<?php
	include("db.php");
	if (!isset($login_id)) {
		header("Location: login.php");
	}else{
	if ($conta_ativa == 0){
	header("Location: deslogar.php");
	}}
	
	$login_id = $_COOKIE['id'];
	$login_nome = $_COOKIE['nome'];
	$login_sobrenome = $_COOKIE['sobrenome'];
	$login_ag = $_COOKIE['ag'];
	$login_conta = $_COOKIE['conta'];
	$conta_ativa = $_COOKIE['ativo'];
	$agencia_moeda = $_COOKIE['agenciamoeda'];
	$agencia_nome = $_COOKIE['agencianome'];
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive; margin: 0;}
	body{background: #F6F6F6;}
	div#topo{width: 100%; top: 0; background: #FFF; box-shadow: 0 0 10px #000; height: 80px;}
	div#topo img[name="logo"]{float: left; margin-left: 20px; margin-top: 18px;}
	div#topo img[name="menu"]{float: right; margin-right: 25px; margin-top: -22px;}
	div#topo input[type="text"]{display: block; margin: auto; width: 300px; border: none; border-radius: 3px; background: #F6F6F6; height: 25px; padding-left: 10px; box-shadow: inset 0 0 6px #666;}
	div#topo form{width: 300px; display: block; margin: auto; padding-top: 22px;}
	div#footer{bottom: 0; text-align: center; color: #666;}
	</style>
</head>
<body>
	<div id="topo">
		<a href="index.php"><img src="img/home.png" width="43" name="logo"></a>
		<form method="GET" action="pesquisar.php">
		<input type="text" placeholder="Procure uma movimentação..." name="query" autocomplete="off"><input type="submit" hidden>
		</form>
		<a href="deslogar.php"><img src="img/logout.png" width="35" name="menu"></a>
		<a href="extrato.php"><img src="img/notificacoes.png" width="35" name="menu"></a>
		<a href="perfil.php"><img src="img/perfil.png" width="30" name="menu"></a>
	</div>
</body>
</html>