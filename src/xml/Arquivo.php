<?php 

namespace src\xml;

/**
 * 
 */
class Arquivo
{
	
	private $xml;
	private $nome;
	private $caminho;

	function __construct($caminho)
	{

		$pathArquivo = pathinfo($caminho);

		$this->nome = $pathArquivo['basename'];
		$this->caminho = $caminho;

		$this->lerArquivoParaXML($caminho);
	}

	public function lerArquivoParaXML($caminho)
	{

		if( "xml" != pathinfo($caminho, PATHINFO_EXTENSION) )
			throw new \Exception("O $caminho não é um XML", 1);

		$this->xml = simplexml_load_file($caminho);

	}
}


 ?>