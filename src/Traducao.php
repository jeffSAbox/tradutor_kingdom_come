<?php 

namespace src;

use src\xml\Arquivo; 
use vendor\Stichoza\GoogleTranslate\TranslateClient;

/**
 * 
 */
class Traducao
{

	private $de;
	private $para;

	private $arquivoXML;
	
	function __construct($de, $para)
	{
		$this->de = $de;
		$this->para = $para;
	}

	public function setArquivoXML(Arquivo $arquivoXML)
	{

		$this->arquivoXML = $arquivoXML;

	}

	public function traduzir()
	{

		/*
		//Lingua de origem, Lingua de destino
		$tr = new TranslateClient('en', 'ka');
		 
		//Irá apresentar "გამარჯობა მსოფლიო"
		echo $tr->translate('Hello World!');
		 
		 
		//Caso queira detecção automática de lingua, basta
		//Lingua de origem, Lingua de destino
		$tr = new TranslateClient(null, 'pt-BR');
		 
		//Irá apresentar "Olá Mundo'"
		echo $tr->translate('Hello World!');
		 
		//Retornará a lingua que foi detectada automaticamente, no caso 'en'.
		echo $tr->getLastDetectedSource();
		*/

	}
}

 ?>