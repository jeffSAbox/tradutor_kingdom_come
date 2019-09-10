<?php 

namespace app\xml;

/**
 * 
 */
class GerenciamentoArquivo extends Arquivo
{
	
	function __construct($caminho, $nome)
	{
		parent::__construct($caminho, $nome);

		$this->lerArquivoParaXML();
	}

	public function lerArquivoParaXML()
	{

		if( empty($this->nome) )
			throw new \Exception("Nenhum arquivo foi passado via _GET", 1);
			
		if( "xml" != pathinfo($this->caminhoCompleto, PATHINFO_EXTENSION) )
			throw new \Exception("O ".$this->caminhoCompleto." não é um XML", 1);

		parent::setXML(simplexml_load_file($this->caminhoCompleto));

	}

	public function gerarArquivoTraduzido()
	{

		$caminhoPT = str_replace("/en/","/pt/",$this->caminhoCompleto);
		$this->xml->asXml($caminhoPT);

	}

	public function concatenar()
	{

		$limiteFrases = 500;
		$textoFinal = "";
		$part = 1;
		$i = 1;
		$cont = 0;

		foreach( $this->xml as $obj ){

			$textoFinal.= $obj->Cell[1]."||";

			if( $i == $limiteFrases ){
				$this->criarArquivo($textoFinal, $this->caminho.'/concatenado/'.$this->nome_base."_part$part.txt");
				$part++;
				$i = 0;
				$textoFinal = "";
			}

			$i++;
			$cont++;
		}

		if( !empty($textoFinal) )
			$this->criarArquivo($textoFinal, $this->caminho.'/concatenado/'.$this->nome_base."_part$part.txt");

		echo "TOTAL FRASES: $cont";

	}

	private function criarArquivo($texto, $caminho)
	{

		$saveArquivo = fopen($caminho, "w");
		
		fwrite($saveArquivo, $texto);
		fclose($saveArquivo);

	}

	public function split()
	{

		$limiteFrases = 1000;
		$part = 1;
		$i = 1;
		$arr = Array();

		$caminhoSplit = $this->caminho."/".basename($this->nome,".xml");
		if( !file_exists($caminhoSplit) )
		mkdir($caminhoSplit);

		foreach( $this->xml as $obj ){

			$arr[] = Array(
			  	"Cell" => (String)$obj->Cell[0],
			  	"Cell1" => (String)$obj->Cell[1],
			  	"Cell2" => (String)$obj->Cell[2],
			);

			if( $i == $limiteFrases ){
				$this->criarXML($arr, $caminhoSplit.'/'.$this->nome_base."_part$part.xml");
				$part++;
				$i = 0;
				$arr = Array();
			}

			$i++;
		}

		if( count($arr) )
			$this->criarXML($arr, $caminhoSplit.'/'.$this->nome_base."_part$part.xml");

	}

	private function criarXML($arr, $caminho)
	{

		$xmlstr = '<?xml version="1.0"?><Table></Table>';
		$sxe = new \SimpleXMLElement($xmlstr);

		foreach( $arr as $frases ){

			$row = $sxe->addChild("Row",'');

			foreach( $frases as $frase ){
				$row->addChild("Cell", $frase);
			}

		}

		$sxe->asXML($caminho);

	}

}



 ?>