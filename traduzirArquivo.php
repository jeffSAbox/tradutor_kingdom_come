<?php 

set_time_limit(10*60);

require 'vendor/autoload.php';

use app\Traducao;
use app\xml\Arquivo;
use Stichoza\GoogleTranslate\GoogleTranslate;

try{

$arquivo 	= $_GET['file'];
$pasta 		= __DIR__."/arquivos/en";

$arquivoXML = new Arquivo($pasta, $arquivo);
$translate = new Traducao('en','pt');

//	ENVIAR O ARQUIVO XML PARA TRANSLATE
$translate->traduzir($arquivoXML);

if( file_exists($arquivoXML->getCaminhoCompleto()) )
	echo "<h3 style='color:green'>Arquivo traduzido com sucesso!</h3>";
else
	echo "<h3 style='color:red'>Acho que deu alguma coisa errada</h3>";

echo "<hr/>";
echo "<a href='/kingdom_come_traducao/'>Voltar para Home</a>";
echo "<hr/>";

echo "<pre>";
var_dump($arquivoXML);

}catch(\Exception $exc){

	echo $exc->getMessage();

}


 ?>