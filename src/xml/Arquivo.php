<?php 

namespace app\xml;

/**
 * 
 */
class Arquivo
{
	
	private $xml;
	private $nome;
	private $caminho;
	private $caminhoCompleto;

	public function getXML(): Object
	{
		return $this->xml;
	}

	public function setXML($xml)
	{
		$this->xml = $xml;
	}

	public function setCaminho($caminho)
	{
		$this->caminho = $caminho;
	}

	public function getCaminhoCompleto():String
	{
		return $this->caminhoCompleto;
	}

	function __construct($caminho, $nome)
	{

		$this->nome = $nome;
		$this->caminho = $caminho;

		$this->caminhoCompleto = "$caminho/$nome";

		$this->lerArquivoParaXML();
	}

	public function lerArquivoParaXML()
	{

		if( empty($this->nome) )
			throw new \Exception("Nenhum arquivo foi passado via _GET", 1);
			
		if( "xml" != pathinfo($this->caminhoCompleto, PATHINFO_EXTENSION) )
			throw new \Exception("O $this->caminhoCompleto não é um XML", 1);

		$this->xml = simplexml_load_file($this->caminhoCompleto);

	}

	public function gerarArquivoTraduzido()
	{

		$caminhoPT = str_replace("/en/","/pt/",$this->caminhoCompleto);
		$this->xml->asXml($caminhoPT);

	}

	public function split()
	{

		$caminhoSplit = $this->caminho."/".basename($this->nome,".xml");
		if( !file_exists($caminhoSplit) )
		mkdir($caminhoSplit);

	}

}


 ?>