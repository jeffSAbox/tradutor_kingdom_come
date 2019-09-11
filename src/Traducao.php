<?php 

namespace app;

use app\xml\Arquivo; 
use Stichoza\GoogleTranslate\GoogleTranslate;

use app\_funcao\TextoTratamento;

/**
 * 
 */
class Traducao
{

	private $de;
	private $para;

	private $arquivoXML;

	private $palavrasNaoTraduzir;
	
	function __construct($de, $para)
	{
		$this->de = $de;
		$this->para = $para;

		$this->palavrasNaoTraduzir = Array(
			"Drop body",
		);


	}
 
	public function traduzir(Arquivo $arquivoXML)
	{
		
		//Lingua de origem, Lingua de destino
		$tr = new GoogleTranslate($this->para, $this->de);
		 
		// TRADUZ O TEXTO
		foreach( $arquivoXML->getXML() as $obj ){

			//	PALAVRAS PARA NAO TRADUZIR
			if( in_array($obj->Cell[1], $this->palavrasNaoTraduzir) ) continue;			

			//	TRANSLATE
			$obj->Cell[2] = $tr->translate($obj->Cell[1]);
		}

		// GERA O ARQUIVO TRADUZIDO
		$arquivoXML->gerarArquivoTraduzido();
		
	}

	public function traduzirViaArquivosTxt(Arquivo $arquivoXML)
	{

		$arrGeral = Array();
		$glob = $arquivoXML->getCaminho()."/concatenado/".$arquivoXML->getNomeBase()."_part*.txt";

		foreach(glob($glob) as $arquivoAtual)   
	    {    

			$handle = fopen($arquivoAtual, "r");
			$contents = fread($handle, filesize($arquivoAtual));
			fclose($handle);

			$arrGeral = array_merge($arrGeral,explode("||",trim(TextoTratamento::corrigir($contents),"||")));

	    }


	    $i = 0;
	    $lastObj = "";
	    foreach( $arquivoXML->getXML() as $obj ){


	    	if( $lastObj == trim($arrGeral[$i]) and count($arquivoXML->getXML()) < count($arrGeral) ){
	    		unset($arrGeral[$i]);

	    		$arrGeral = array_values($arrGeral);
	    	} 

	    	$obj->Cell[2] = trim($arrGeral[$i]);

	    	$lastObj = $obj->Cell[2];
	    	$i++;
	    }

	    $arquivoXML->gerarArquivoTraduzido();

	}

}

 ?>