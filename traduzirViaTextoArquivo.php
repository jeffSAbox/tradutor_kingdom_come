<?php 
header("Content-type: text/html;charset=utf-8");
set_time_limit(10*60);

require 'vendor/autoload.php';

use app\xml\GerenciamentoArquivo;
use app\Traducao;

try{

$arquivo 	= $_GET['file'];
$pasta 		= __DIR__."/arquivos/en";

$translate = new Traducao("en","pt");
$arquivoXML = new GerenciamentoArquivo($pasta, $arquivo);

//	TRADUZ VIA ARQUIVOS DE TXT :> ARQUIVOS/EN/CONCATENADO/...
$translate->traduzirViaArquivosTxt($arquivoXML);

if( file_exists($arquivoXML->getCaminhoCompleto()) )
	echo "<h3 style='color:green'>Arquivo traduzido(via txt) com sucesso!</h3>";
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