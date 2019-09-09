<?php 

require "autoload.php";

$pasta 		= __DIR__."/arquivos/en";
$arquivos 	= scandir($pasta);

?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Traducao do Kingdom Come</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
 <body class="container">
 
 	<h3>Traducao do Kingdom Come</h3>
 	<br><br>
 	<table class="table">

 		<thead><tr><th colspan='3'>Lista de arquivos</th></tr></thead>

 		<tbody>
 			<?php 

 			array_filter($arquivos, function($ar) use ($pasta){
 				if("xml" != pathinfo($pasta."/$ar", PATHINFO_EXTENSION)) return;

 				$check = false;
 				if( file_exists(str_replace("/en","/pt",$pasta)."/".$ar) ) $check = true;

 				echo "<tr>";

 				echo "<td>$ar</td>";

 				if( !$check )
 					echo "<td><a class='btn btn-primary' href='traduzirArquivo.php?file=$ar' >Traduzir</a></td>";
 				else
 					echo "<td><a class='btn btn-success' href='javascript:void(0)' >Já traduzido</a></td>";

 				echo "<td>".round(filesize("$pasta/$ar") / 1024, 2)." Kb</td>";

 				echo "</tr>";
 			});

 			 ?>
 		</tbody>	

 	</table>

 </body>
 </html>