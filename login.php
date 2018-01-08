<?php
	include("db.php");

	if (isset($_POST['entrar'])) {
		$agencia_unsafe = $_POST['agencia'];
		$agencia = mysqli_real_escape_string($connect, $agencia_unsafe);
		$conta_unsafe = $_POST['conta'];
		$conta = mysqli_real_escape_string($connect, $conta_unsafe);
		$password_unsafe = $_POST['password'];
		$password = mysqli_real_escape_string($connect, $password_unsafe);
		
		$verifica = mysqli_query($connect,"SELECT * FROM contas WHERE ag = '$agencia' AND conta='$conta' AND senha='$password'");
		if (mysqli_num_rows($verifica)<=0) {
			echo "<h3>Dados inseridos incorretamente!</h3>";
		}else{
			$logando = mysqli_query($connect,"SELECT * FROM contas WHERE ag = '$agencia' AND conta='$conta' AND senha='$password'");
			$login = mysqli_query($connect,"SELECT * FROM agencias WHERE agenciaid = '$agencia'");
			while ($rowag= mysqli_fetch_array($login, MYSQLI_ASSOC)) {
    			setcookie("agenciamoeda",$rowag["agenciamoeda"]);
				setcookie("agencianome",$rowag["agencianome"]);
    }
			while ($row = mysqli_fetch_array($logando, MYSQLI_ASSOC)) {
				setcookie("id",$row["id"]);
				setcookie("nome",$row["nome"]);
				setcookie("sobrenome",$row["sobrenome"]);
				setcookie("ag",$row["ag"]);
				setcookie("conta",$row["conta"]);
				setcookie("ativo",$row["ativo"]);
				header("location: ./");
    }
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
	*{font-family: 'Montserrat', cursive;}
	img{display: block; margin: auto; margin-top: 20px; width: 200px;}
	form{text-align: center; margin-top: 20px;}
	input[type="agencia"]{border: 1px solid #CCC; width: 90px; height: 25px; padding-left: 10px; border-radius: 3px;}
	input[type="conta"]{border: 1px solid #CCC; width: 158px; height: 25px; padding-left: 10px; border-radius: 3px;}
	input[type="password"]{border: 1px solid #CCC; width: 250px; height: 25px; padding-left: 10px; margin-top: 10px; border-radius: 3px;}
	input[type="submit"]{border: none; width: 80px; height: 30px; margin-top: 20px; border-radius: 3px;}
	input[type="submit"]:hover{background-color: #1E90FF; color: #FFF; cursor: pointer;}
	h2{text-align: center; margin-top: 5px;}
	h3{text-align: center; color: #1E90FF; margin-top: 15px;}
	a{text-decoration: none; color: #333;}
	p{text-align: center;}
	</style>
</head>
<body>
	<img src="img/logo.png"><br />
	<h2>Acesse sua conta</h2>
	<form method="POST">
		<input type="agencia" placeholder="Agência" name="agencia">  <input type="conta" placeholder="Conta" name="conta"><br />
		<input type="password" placeholder="Senha" name="password"><br />
		<input type="submit" value="Acessar" name="entrar">
	</form>
	<div id="footer"><p><?php echo $copy; ?></p></div><br />
	<div id="footer"><p><?php echo $ip_entrando; ?></p></div><br />
</body>
</html>
