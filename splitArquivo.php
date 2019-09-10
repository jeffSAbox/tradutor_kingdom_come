<?php 

require 'vendor/autoload.php';

use app\xml\Arquivo;

try{

$arquivo 	= $_GET['file'];
$pasta 		= __DIR__."/arquivos/en";

$arquivoXML = new Arquivo($pasta, $arquivo);

//	DIVIDIR O ARQUIVOS EM VARIOS
$arquivoXML->split();

echo "<h3 style='color:green'>Arquivo dividido com sucesso!</h3>";

echo "<hr/>";
echo "<a href='/kingdom_come_traducao/'>Voltar para Home</a>";
echo "<hr/>";

echo "<pre>";
var_dump($arquivoXML);

}catch(\Exception $exc){

	echo $exc->getMessage();

}

 ?>