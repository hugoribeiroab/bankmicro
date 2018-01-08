<?php
	error_reporting(0);
	ini_set(“display_errors”, 0 );
	$servidor = "localhost";
	$usuariodb = "root";
	$senhadb = "";
	$db = "iomco_banco";
	$connect = mysqli_connect($servidor, $usuariodb, $senhadb, $db) or die("<h3>Não foi possível ligar ao servidor...</h3>");

	$title= "Banco de Constantinopla";
	$year= date("Y");

	$ip_entrando = $_SERVER["REMOTE_ADDR"];

	$copy= "&copy".$title.", ".$year." - Todos os direitos reservados";
?>
<html>
<header>
	<meta charset="utf-8">
	<title>Banco de Constantinopla</title>
	<style type="text/css">
		html{
			-webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
		       -moz-animation: fadein 2s; /* Firefox < 16 */
		        -ms-animation: fadein 2s; /* Internet Explorer */
		         -o-animation: fadein 2s; /* Opera < 12.1 */
		            animation: fadein 2s;
		}

		@keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Firefox < 16 */
		@-moz-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Safari, Chrome and Opera > 12.1 */
		@-webkit-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Internet Explorer */
		@-ms-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}

		/* Opera < 12.1 */
		@-o-keyframes fadein {
		    from { opacity: 0; }
		    to   { opacity: 1; }
		}}
	</style>
</header>
</html>