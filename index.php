<?php
	include("header.php");

?>
<html>
<header>
	<style type="text/css">
	h2{text-align: center; margin-top: 10px;}
	h4{text-align: center; padding-top: 1px;}
	div#publish{width: 410px; height: 290px; display: block; margin: auto; border: none; border-radius: 5px; background: #FFF; box-shadow: 0 0 6px #A1A1A1; margin-top: 10px;}
	div#publish textarea{width: 370px; height: 150px; display: block; margin: auto; border-radius: 5px; padding-left: 5px; padding-top: 5px; border-width: 1px; border-color: #A1A1A1;}
	div#publish input[type="password"]{border: 1px solid #A1A1A1; border-radius: 5px; width: 200px; height: 25px; margin-top: 5px; margin-left: 20px; cursor: pointer;}
	div#publish input[type="ag"]{border: 1px solid #A1A1A1; border-radius: 5px; width: 188px; height: 25px; margin-top: 5px; margin-left: 20px; cursor: pointer;}
	div#publish input[type="ct"]{border: 1px solid #A1A1A1; border-radius: 5px; width: 175px; height: 25px; margin-top: 5px; margin-left: 5px; cursor: pointer;}
	div#publish input[type="value"]{border: 1px solid #A1A1A1; border-radius: 5px; width: 370px; height: 25px; margin-top: 5px; margin-left: 20px; cursor: pointer; margin-bottom: 5px;}
	div#publish input[type="submit"]{width: 80px; height: 25px; border-radius: 3px; float: right; margin-right: 45px; border: none; margin-top: 5px; background: #4169E1; color: #FFF; cursor: pointer;}
	div#publish input[type="submit"]:hover{background: #001F3F;}
	</style>
</header>
<body>
	<h2><?php echo $login_nome." ".$login_sobrenome; ?>, bem vindo ao balcão de operações.</h2><br />
	<h4><?php
			if (isset($login_id)) {
			$saldocalc = mysqli_query($connect,"SELECT * FROM contas WHERE ag = '$login_ag' AND conta='$login_conta' AND id='$login_id'");
					while ($row = mysqli_fetch_array($saldocalc, MYSQLI_ASSOC)) {
					$saldo = $row["saldo"];}
    				}
					echo 'Saldo atual: ', $agencia_moeda."".$saldo;?>
					</h4><br />
	<div id="publish">
		<form method="POST" enctype="multipart/form-data">
			<br />
			<input type="ag" placeholder="Agência para transferência" name="ag"/> <input type="ct" placeholder="Conta para transferência" name="ct"/>
			<input type="value" placeholder="Valor a ser transferido" name="value"/>
			<textarea placeholder="Descrição da operação" name="texto"></textarea>
			<label>
				<input type="password" placeholder="Digite sua senha" name="password">
			</label> <input type="submit" value="Transferir" name="transferir" />

			<input type="file" id="file-input" name="file" hidden />
		</form>
	</div>
	<br />
	<div id="footer"><p>&copy; <?php echo $title.", ".$year;?> - Todos os direitos reservados</p></div><br />
</body>
</html>