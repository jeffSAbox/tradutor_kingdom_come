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

 		<thead><tr><th colspan='5'>Lista de arquivos</th></tr></thead>

 		<tbody>
 			<?php 

 			array_filter($arquivos, function($ar) use ($pasta){
 				if("xml" != pathinfo($pasta."/$ar", PATHINFO_EXTENSION)) return;

 				$check = false;
 				if( file_exists(str_replace("/en","/pt",$pasta)."/".$ar) ) $check = true;

 				echo "<tr>";

 				echo "<td>$ar</td>";

 				if( !$check ){
 					echo "<td><a class='btn btn-primary' href='traduzirArquivo.php?file=$ar' >Traduzir</a></td>";

 					echo "<td>";
	 				if( !file_exists($pasta."/".basename($ar,".xml")) ) 
	 				echo "<a class='btn btn-warning' href='splitArquivo.php?file=$ar' >Split</a>";
	 				echo "</td>";

	 				$check = false;
	 				if( file_exists($pasta."/concatenado/".basename($ar,".xml")."_part00000001.txt") ) $check = true;
	 				if( !$check )
	 					echo "<td><a class='btn btn-secondary' href='concatenarArquivo.php?file=$ar' >Concatenar</a></td>";
	 				else
	 					echo "<td><a class='btn btn-warning' href='traduzirViaTextoArquivo.php?file=$ar' >Traduzir via Texto</a></td>";

	 				echo "<td>".round(filesize("$pasta/$ar") / 1024, 2)." Kb</td>";
 				}
 				else
 					echo "<td colspan='4'><a class='btn btn-success' href='correcaoReplaceLista.php?file=$ar' >Já traduzido</a></td>";

 				echo "</tr>";
 			});

 			 ?>
 		</tbody>	

 	</table>

 </body>
 </html>