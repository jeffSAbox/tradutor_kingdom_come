<?php 

namespace app\_funcao;

/**
 * 
 */
class TextoTratamento
{
		
	public static function corrigir($texto): String
	{

		$texto = self::remover_caracter($texto);

		$texto = trim($texto);
		$texto = utf8_encode($texto);

		$texto = self::replaceLista($texto);
		$texto = self::remover_caracter($texto);

		return $texto;

	}

	public static function criarTags($texto): String
	{

		$correcoesLista = Array(
			"&lt;" => "[lt]",
			"&gt;" => "[gt]",
			"&nbsp;" => " ",
		);

		foreach( $correcoesLista as $de => $para ){

			$texto = str_replace($de,$para,$texto);

		}

		return $texto;

	}

	public static function replaceLista($texto): String
	{

		$correcoesLista = Array(
			"% s" => "%s",
			"( {" => "({",
			"} )" => "})",
			"$ " => "$",
			" & " => "&",
			" = " => "=",
			"img: " => "img:",
			'$h; ' => '$h;',
			'$H; ' => '$h;',
			'[lt ]' => '&lt;',
			'[lt]' => '&lt;',
			'[ lt ]' => '&lt;',
			'[gt]' => '&gt;',
			'[ gt]' => '&gt;',
			'[ gt ]' => '&gt;',
			'& gt;' => '&gt;',
			'&Lt;' => '&lt;',
			' $h_end;' => '$h_end;',
			"$font_color;;" => "$font_color;Mapa$ font_end;", # TUTORIAL
			'$Font_end;' => '$font_end;',
			'$font_color; ' => '$font_color;',
			'$font_end ;' => '$font_end;',
			' $font_end;' => '$font_end;',			
			'$ font_end;' => '$font_end;',			
			'tamanho da fonte' => 'font size',			
			" '&" => " &",
			' | ;' => '|;',
			' | $' => '|$',
			'|. # |' => '. | # |',
			'|! # |' => '! | # |',
			'| # | |' => '| # |',
			'| # # |' => '| # |',
			'. |.' => '.|.',
			'; |}' => ';|}',
			'&lt; br /&gt;' => '&lt;br/&gt;',
			'src =' => 'src=',
			'&lt; img' => '&lt;img',
			"height='64&gt;" => "height='64'&gt;",
			"'height =' 64 '" => "height='64'",
			//' &gt;' => '&gt;',
			' ≪ br />' => '<br/>',
			'br / &' => 'br/&',
			'$bloco;' => '$block;',
			'bloco $;' => '$block;',
			'Texturas / ' => 'Textures/',
			'Texturas' => 'Textures',			
			'Libs /' => 'Libs/',			
			'UI /' => 'UI/',			
			'Textures /' => 'Textures/',			
			'Dynamic /' => 'Dynamic/',			
			"dds 'width" => "dds' width",			
			". dds" => ".dds",			
			'$P;' => '$p;',						
			'$h;INVENTORY$h_end;' => '$h;INVENTARIO$h_end;',			
			'$h;EAT$h_end;' => '$h;$COMER$h_end;',			
			'$h;STAY$h_end;' => '$h;$FIQUE$h_end;',			
			'$h;FREE$h_end;' => '$h;$LIVRE$h_end;',			
			'$h;AGGRESSIVE DOG$h_end;' => '$h;$CACHORO AGRESSIVO$h_end;',			
			'$h;WARNING$h_end;' => '$h;ALERTA$h_end;',			
			'$h;WARNING!$h_end;' => '$h;ALERTA!$h_end;',			
			'$h;COMPAS$h_end;' => '$h;BUSSOLA$h_end;',			
			'$h;INVENTORY$h_end;' => '$h;INVENTARIO$h_end;',			
			'$h;IN COMBAT$h_end;' => '$h;$EM COMBATE$h_end;',			
			'$h;SURRENDER$h_end;' => '$h;$SE RENDER$h_end;',			
			'$h;DISGUISE$h_end;' => '$h;DISFARCE$h_end;',			
			'$h;TOURNEY$h_end;' => '$h;TORNEIO$h_end;',			
			'$h;THEFT$h_end;' => '$h;ROUBAR$h_end;',			
			'$h;HUNGER$h_end;' => '$h;FOME$h_end;',			
			'$h;SKIP TIME$h_end;' => '$h;PASSAR O TEMPO$h_end;',			
			'$h;WHISTLING$h_end;' => '$h;ASSOBIAR$h_end;',			
			'$h;HORSE$h_end;' => '$h;CAVALO$h_end;',			
			'$h;GUARDS$h_end;' => '$h;GUARDAS$h_end;',			
			'$h;AMBUSH$h_end;' => '$h;EMBOSCADA$h_end;',			
			'$h;CHARACTER$h_end;' => '$h;PERSONAGEM$h_end;',			
			'$h;MOVEMENT$h_end;' => '$h;MOVIMENTO$h_end;',			
			'$h;SEEK$h_end;' => '$h;PROCURAR$h_end;',			
			'$h;HUNT$h_end;' => '$h;CAÇAR$h_end;',			
			'$h;ALCHEMY$h_end;' => '$h;ALQUIMIA$h_end;',			
			'$h;TARGET ARCHERY$h_end;' => '$h;TIRO AO ALVO$h_end;',			
			'$h;TORCH$h_end;' => '$h;TOCHA$h_end;',			
			'$h;ROOM$h_end;' => '$h;QUARTO$h_end;',			
			'$h;LOW STATS$h_end;' => '$h;STATUS BAIXO$h_end;',			
			'$h;INJURES$h_end;' => '$h;FERIMENTO GRAVE$h_end;',			
			'$h;GRAVEDIGGER$h_end;' => '$h;ITENS EM CARDAVER$h_end;',			
			'$h;SCARING$h_end;' => '$h;ASSUSTAR$h_end;',			
			'$h;BLEEDING$h_end;' => '$h;SANGRANDO$h_end;',			
			'$h;DOG RAN OFF$h_end;' => '$h;CACHORRO FUGIU$h_end;',			
			'$h;ALARM$h_end;' => '$h;ALARME$h_end;',			
			'$h;HEEL$h_end;' => '$h;PROXIMO$h_end;',			
			'$h;DRUNKENNESS$h_end;' => '$h;BEBIDAS$h_end;',			
			'Heel' => 'Proximo',			
			'heel' => 'proximo',			
			'Numbskull' => 'Cabeca lenta',			
			'Shakes' => 'Tremedeira',			
			'Sonambulant' => 'Sonambulo',			
			"'align =' baseline" => "align='baseline'",			
			"'vspace =' - 22" => "vspace='-22'",			
			"'vspace =' - 22" => "vspace='-22'",			
			"'vspace =' -22" => "vspace='-22'",			
			"- 22" => "-22",			
			"'64 '" => "'64'",			
			"'40 '" => "'40'",			
			"'32 '" => "'32'",			
			"'height" => " 'height",			
			"'height='64" => "height='64'",			
			"width='60 " => "width='60'",			
			"height='64''" => "height='64'",			
			"'height =' 70" => "height='70'",			
			"width='80 " => "width='80'",			
			'$request_dog ^ ;' => '$request_dog^;',			
			'$ new_page' => '$new_page',			
			'&lt; p' => '&lt;p',			
			'fonte' => 'font',			
			'&lt; fonte' => '&lt;font',			
			'&lt; font' => '&lt;font',				
			'&lt; ' => '&lt;',			
			' &gt; ' => '&gt;',			
			"'height =' 64&gt;" => "height='64'&gt;",			
			'/ ' => '/',			
			'&lt; &gt;' => '&lt;&gt;',			
			'$New_page' => '$new_page',			
			'/ UI /' => '/UI/',			
			'/ Libs /' => '/Libs/',	
			'/Dinamico ' => '/Dynamic/',	
			'/ Dinamico /' => '/Dynamic/',	
			'quest ^;' => 'quest^;',	
			"height='64 align" => "height='64' align",	
			"width='66  height" => "width='66'  height",	
			'$use ^;' => '$use^;',	
			'$renda;' => '$surrender;',	
			"height='74'&lt;br/&gt;" => "height='74'&gt;&lt;br/&gt;",	
			"'&lt;br/&gt;" => "'&gt;&lt;br/&gt;",	
			"perfeitos Para desviar" => "perfeitos&lt;br/&gt;Para desviar",	
			"terminar as filmagens recebe" => "terminar os disparos recebe",	
			"Warhorse Studios, versao:" => "Warhorse Studios, PT-BR(by zlKS), versao:",	
			'GRINDSTONE' => "FORJA",	
			'Grindstone' => "Forja",	
			'Va para o Pai' => "Vá até o seu Pai",	
			"fontsize = '" => "fontsize='",	
			"'# " => "'#",	
			'NA­vel' => "Nivel",	
			'A³' => "o",	
			'$ close_help_screen ^' => "$close_help_screen^",	
			'$ sword_position ;' => "$sword_position;",	
			'$ ' => "$",	
			"'# " => "'#",	
			"$close_help_screen ^;" => "$close_help_screen^;",	
			'Sidekicks' => 'Companheiros',	
			'color = ' => 'color=',	
			'A©' => '©',	
			'Voce e permanentemente inconsciente.' => 'Voce está permanentemente inconsciente.',	
			'Voce e inconsciente' => 'Voce está inconsciente',	
			'Lockpicking' => 'Arrombamento',	
			'QUESTSY' => 'MISSOES',	
			'QUESTLOG' => 'REGISTRO DE MISSOES',	
			'Registro de missoes' => 'Missoes',	
			'DRAWN WEAPON' => 'ARMA DESENHADA',	
			'WALKING' => 'CAMINHADA',	
			'COMBAT TRAINING' => 'TREINAMENTO DE COMBATE',	
			'HOME' => 'CASA',	
			'{$ui_toggle_codex; |' => '{$ui_toggle_codex;|',	
			'DISOBEDIENCE' => 'DESOBEDIÊNCIA',	
			'TRESSPASSING' => 'TRANSGREDIR',	
			'TIREDNESS' => 'CANSAÇO',	
			'{$ui_toggle_quest; |}' => '{$ui_toggle_quest;|}',	
			"width='377 height" => "width='377' height",	
			"height =' 377&gt;" => "height='377' &gt;",	
			"height='85&gt;" => "height='85'&gt;",	
			"height='36&gt;" => "height='36' &gt;",	
			'$ui_reset ;' => '$ui_reset;',
			'i»¿A' => '',
			'Pickpocketing' => 'Roubo',
			'&lt;/p &gt;' => '&lt;/p&gt;',
			'$use ;' => '$use;',
			"width='42   'height" => "width='42' height",
			"src=' img://" => "src='img://",
			"img : //" => "img://",
			"width='64 height" => "width='64' height",
			"align='linha de base'" => "align='baseline'",
			"width='128' de altura='36&lt;br/&gt;" => "width='128' height='36' &gt;&lt;br/&gt;",
			'< br />' => '&lt;br/&gt;',
			' ;' => ';',
			'/Dinamicas /' => '/Dynamic/',
			"'height =' 6 4&gt;" => "height='64' &gt;",
			"/Dynamic//" => "/Dynamic/",
			"; + $" => ";+$",
			"height='40&gt;" => "height='40'&gt;",
			"'height='40'" => "height='40'",
			"width='40 'height" => "width='40' height",
			"width='40 height" => "width='40' height",
			"vspace='- 50'" => "vspace='-50'",
			"width='66   'height='66'" => "width='66' 'height='66'",
			"height='74&gt;" => "height='74'&gt;",
			" .dds" => ".dds",
			"'height='70'" => "height='70'",
			"height='70&gt;" => "height='70'&gt;",
			"font &gt;" => "font&gt;",
			"Questlog" => "Registro de missoes",
			"OVEREATING" => "SOBRECARREGANDO",
			"BREWERY" => "CERVEJARIA",
			"REPUTATION" => "REPUTACAO",
			"Hunger" => "Fome",
			"Inventař" => "Inventario",
			'$h;$INVENTARIO;$h_end;' => '$h;INVENTARIO$h_end;',
			"width='64 'height" => "width='64' height",
			"width='61  height" => "width='61'  height",
			"width='40   height" => "width='40'   height",
			"width='22   'height" => "width='22' height",
			"height =' 22&gt;" => "height='22'&gt;",
			"height='61&gt;" => "height='61'&gt;",
			"height='22&gt;" => "height='22'&gt;",
			"width='25   'height" => "width='25' height",
			"width =' 80   height='70'" => "width ='80'  height='70'",
			"width ='80'" => "width='80'",
			"width='377 height" => "width='377' height",
			"width='67   'height" => "width='67' height",
			" width=' 79   'height =' 74&lt;br/&gt;" => " width='79' height='74' &gt;&lt;br/&gt;",
			'ccursor3.dds "width =" 80 "height =" 70 "' => 'ccursor3.dds" width="80" height="70"',
			"height =' 64 align" => "height='64' align",			
			"/Dinamica /" => "/Dynamic/",
			"width=Altura '60'='64" => "width='60' height='64'",
			"height=' 64&lt;br/&gt;" => "height='64'&gt;&lt;br/&gt;",
			'a¢' => '•',
			'i»¿' => '',
			'a¦' => '...',
			'full straight' => 'totalmente direto',
			'reta parcial' => 'parcial direto',
			'Goodman' => 'Bom homem',
			'goodman' => 'bom homem',

			'Eu gostaria de dinheiro.' => "Eu gostaria de algum dinheiro.", # TUTORIAL
			'Hoje e um arrasador, nao e?' => "Hoje está um quente, não é?", # TUTORIAL
			//'"' => "'", # TUTORIAL
			//'a Principal' => 'Principal', # MENU
			//'Lado' => 'Secundario',		# MENU
			//" &lt;img src='img://Libs/UI/Textures/Dynamic/icon_prompt_1.dds' width='40' height='40'&gt;Se voce parecer perigoso," => "&lt;img src='img://Libs/UI/Textures/Dynamic/icon_prompt_1.dds' width='40' height='40'&gt;Se voce parecer perigoso,",		# MENU

			//'O carrasco foi novamente' => "&lt;p&gt;O carrasco foi novamente",	
			//'Eu fui mais longe ao longo' => "&lt;p&gt;Eu fui mais longe ao longo",	
			//'Quando s' => "&lt;p&gt;Quando s",	
			//'$h;EM C0MBATE$h_end;' => '$h;IN COMBAT$h_end;',
			//'$h;C0MA$h_end;' => '$h;EAT$h_end;',
			//'$h;DES0BEDIENCIA$h_end;' => '$h;STEALTH$h_end;',
			//'$h;CRIME$h_end;' => '$h;CRIME$h_end;',
		);

		foreach( $correcoesLista as $de => $para ){

			$texto = str_replace($de,$para,$texto);

		}

		return $texto;

	}

	public static function remover_caracter($string): String 
	{

	    $comAcentos = Array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

		$semAcentos = Array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');


		return str_replace($comAcentos, $semAcentos, $string);

	}

	public static function listaNaoTraduz($texto): bool
	{
		$arr = Array(
			"cr_"
		);

		foreach( $arr as $valor ){
			if( strripos($texto,$valor) !== false )
				return false;
		}
		
		return true;
	}

}

 ?>