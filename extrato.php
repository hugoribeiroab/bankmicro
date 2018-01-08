<?php
	include("header.php");
	$extrato = mysqli_query($connect,"SELECT * FROM contas WHERE ag = '$agencia' AND conta='$conta' AND senha='$password'");
?>
<html>
<header>
	<style type="text/css">
	h3{text-align: center; color: #007fff;}
	div.not{width: 400px; height: 70px; display: block; margin: auto; border: none; border-radius: 5px; background-color: #FFF; box-shadow: 0 0 6px #A1A1A1; text-align: center;}
	div.not a{color: #666; text-decoration: none; position: relative; top: 40%;}
	div.not a:hover{color: #111; text-decoration: none;}
	</style>
</header>
<body>
	<br />
	<br />
	<br />
	<?php
		if (mysql_num_rows($extrato)>=1) {
			echo "<h3>Seu extato:</h3>";
			while ($not=mysql_fetch_assoc($notificacoes)) {
				$email = $not['userde'];
				$saberr = mysql_query("SELECT * FROM users WHERE email='$email'");
				$saber = mysql_fetch_assoc($saberr);
				$nome = $saber['nome']." ".$saber['apelido'];
				$id = $not['id'];

				if ($not['tipo']=="1") {
					echo '<br /><div class="not" id="'.$id.'">
						<a href="myprofile.php?id='.$not['post'].'">'.$nome.' gostou da tua publicação</a>
					</div>';
				}elseif($not['tipo']=="2"){
					echo '<br /><div class="not" id="'.$id.'">
						<a href="comentarios.php?id='.$not['post'].'">'.$nome.' comentou a tua publicação</a>
					</div>';
				}
			}
			echo "<br /><h3>Não tens mais notificações...</h3>";
		}else{
			echo "<br /><h3>Não existem transações...</h3>";
		}
	?>
	<br />
	<div id="footer"><p>&copy; <?php echo $title.", ".$year;?> - Todos os direitos reservados</p></div><br />
</body>
</html>