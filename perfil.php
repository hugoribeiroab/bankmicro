<?php
	include("header.php");

	if (isset($_POST['autenticar'])){
		header("Location: autenticar.php");
    }elseif(isset($_POST['transacao'])){
		header("Location: ./");
	}else{
        // do nothing
    }

?>
<html>
<header>
	<style type="text/css">
	h2{text-align: center; padding-top: 30px; color: #FFF;}
	h4{text-align: center; padding-top: 1px; color: #FFF;}
	img#profile{width: 100px; height: 100px; display: block; margin: auto; margin-top: 30px; border: 5px solid #007fff; background-color: #007fff; border-radius: 10px; margin-bottom: -30px;}
	div#menu{width: 308px; height: 200px;display: block; margin: auto; border: none; border-radius: 5px; background-color: #007fff; text-align: center;}
	div#menu input{height: 25px; border: none; border-radius: 3px; background-color: #FFF; cursor: pointer;}
	div#menu input[name="autenticar"]{margin-right: 10px;}
	div#menu input:hover{height: 25px; border: none; border-radius: 3px; background-color: transparent; cursor: pointer; color: #FFF;}
	div.pub{width: 400px; min-height: 70px; max-height: 1000px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 30px;}
	div.pub a{color: #666; text-decoration: none;}
	div.pub a:hover{color: #111; text-decoration: none;}
	div.pub p{margin-left: 10px; content: #666; padding-top: 10px;}
	div.pub span{display: block; margin: auto; width: 380px; margin-top: 10px;}
	div.pub img{display: block; margin: auto; width: 100%; margin-top: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;}
	</style>
</header>
<body>
	<?php
			echo '<a href="profilepic.php" style="width: 100px; display: block; margin: auto;"><img src="img/user.png" id="profile"></a>';
	?>
	<div id="menu">
		<form method="POST">
			<h2><?php echo $login_nome." ".$login_sobrenome; ?></h2><br />
			<h4><?php
			echo 'Agência: ', $login_ag." ".'Conta: ', $login_conta; 
			?></h4><br />
			<h4><?php
			if (isset($login_id)) {
			$saldocalc = mysqli_query($connect,"SELECT * FROM contas WHERE ag = '$login_ag' AND conta='$login_conta' AND id='$login_id'");
					while ($row = mysqli_fetch_array($saldocalc, MYSQLI_ASSOC)) {
					$saldo = $row["saldo"];}
    				}
					echo 'Saldo atual: ', $agencia_moeda."".$saldo;?>
					</h4><br />
			<input type="submit" value="Autenticar transação" name="autenticar"><input type="submit" name="transacao" value="Nova transação">
		</form>
	</div>
	<br />
	<div id="footer"><p><?php echo $copy; ?></p></div><br />
</body>
</html>
