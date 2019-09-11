<?php 

namespace app\_funcao;

/**
 * 
 */
class TextoTratamento
{
		
	public static function corrigir($texto): String
	{

		$correcoesLista = Array(
			"% s" => "%s",
		);

		foreach( $correcoesLista as $de => $para ){

			$texto = str_replace($de,$para,$texto);

		}

		return $texto;

	}

}

 ?>