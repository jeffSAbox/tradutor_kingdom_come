<?php 

namespace app;

use app\xml\Arquivo; 
use Stichoza\GoogleTranslate\GoogleTranslate;

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
}

 ?>