<?php
	include("header.php");
?>
<html>
	<header>
		<style type="text/css">
			h3{text-align: center; font-size: 32px; color: #666;}
			h2{text-align: center; font-size: 46px; color: #666;}
			p[name="p"]{display: block; margin: auto; font-size: 20px; text-align: center; color: #FFF; max-width: 700px;}
			a[name="p"]{color: #111111; text-decoration: none;}
			hr{border: 1px solid #666; width: 500px; display: block; margin: auto;}
		</style>
	</header>
	<body>
		<h2>Resultados da tua pesquisa</h2><br />
		<?php
			$query = $_GET['query'];

			$min_length = 3;

			if (strlen($query) >= $min_length) {
				$query = htmlspecialchars($query);

				$query = mysql_real_escape_string($query);

				$raw_results = mysql_query("SELECT * FROM users WHERE (`nome` LIKE '%".$query."%')") or die(mysql_error());

				if (mysql_num_rows($raw_results) > 0) {
					echo "<br /><br />";
					while ($results = mysql_fetch_array($raw_results)) {
						echo '<a href="profile.php?id='.$results["id"].'" name="p"><br /><p name="p"><h3>'.$results["nome"].' '.$results["apelido"].'</h3></p><br /></a><br /><hr /><br />';
					}
				}else{
					echo "<br /><h3>Não foram encontrados resultados...</h3>";
				}
			}else{
				echo "<br /><h3>Tens de escrever pelo menos 3 letras...</h3>";
			}
		?>
	</body>
</html>