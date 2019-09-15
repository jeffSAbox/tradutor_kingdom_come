<?php 

namespace app\xml;

/**
 * 
 */
class Arquivo
{
	
	protected $xml;
	protected $nome;
	protected $nome_base;
	protected $caminho;
	protected $caminhoCompleto;

	public function getXML(): Object
	{
		return $this->xml;
	}

	public function getNome(): String
	{
		return $this->nome;
	}

	public function getNomeBase(): String
	{
		return $this->nome_base;
	}

	public function getCaminho(): String
	{
		return $this->caminho;
	}

	public function setXML($xml)
	{
		$this->xml = $xml;
	}

	public function setCaminho($caminho)
	{
		$this->caminho = $caminho;
	}

	public function getCaminhoCompleto(): String
	{
		return $this->caminhoCompleto;
	}

	public function setCaminhoCompleto($caminho)
	{
		$this->caminhoCompleto = $caminho;
	}

	function __construct($caminho, $nome)
	{

		$this->nome = $nome;
		$this->caminho = $caminho;

		$this->caminhoCompleto = "$caminho/$nome";
		$this->nome_base = basename($nome,".xml");

	}

}


 ?>