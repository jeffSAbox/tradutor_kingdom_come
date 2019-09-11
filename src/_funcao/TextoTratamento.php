<?php 

namespace app\_funcao;

/**
 * 
 */
class TextoTratamento
{
		
	public static function corrigir($texto): String
	{

		$texto = trim($texto);
		$texto = utf8_encode($texto);

		$texto = self::replaceLista($texto);
		$texto = self::remover_caracter($texto);

		return $texto;

	}

	public static function replaceLista($texto): String
	{

		$correcoesLista = Array(
			"% s" => "%s",
			"( {" => "({",
			"} )" => "})",
		);

		foreach( $correcoesLista as $de => $para ){

			$texto = str_replace($de,$para,$texto);

		}

		return $texto;

	}

	public static function remover_caracter($string): String 
	{

	    $comAcentos = Array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

		$semAcentos = Array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');


		return str_replace($comAcentos, $semAcentos, $string);

	}

}

 ?>