<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */



function data_extenso($data)
{
	$tmpdata = explode('-', $data);
	$dia = $tmpdata[2];
	$mes = $tmpdata[1];
	$ano = $tmpdata[0];
	//$semana = date('w');


// configura��o mes

switch($mes):
	case 1: $mes = "Janeiro"; break;
	case 2: $mes = "Fevereiro"; break;
	case 3: $mes = "Mar&ccedil;o"; break;
	case 4: $mes = "Abril"; break;
	case 5: $mes = "Maio"; break;
	case 6: $mes = "Junho"; break;
	case 7: $mes = "Julho"; break;
	case 8: $mes = "Agosto"; break;
	case 9: $mes = "Setembro"; break;
	case 10: $mes = "Outubro"; break;
	case 11: $mes = "Novembro"; break;
	case 12: $mes = "Dezembro"; break;
endswitch;

	return $dia.' de '.$mes.' de '.$ano;
	
	
// configura��o semana
/*switch($semana):
	case 0: $semana = "Domingo"; break;
	case 1: $semana = "Segunda-feira"; break;
	case 2: $semana = "Ter&ccedil;a-feira"; break;
	case 3: $semana = "Quarta-feira"; break;
	case 4: $semana = "Quinta-feira"; break;
	case 5: $semana = "Sexta-feira"; break;
	case 6: $semana = "S&aacute;bado"; break;
endswitch;*/
//Agora basta imprimir na tela...
}


/**
 * Formata as horas para os padr�es brasileiros
 *
 * @access	public
 * @param	string
 * @return	string
 */	 
 
function hora($hora,$tipo='P'){
	if($tipo == 'P')
	{
		if((!$hora)|| ($hora=='00:00:00'))
		{
			return '';
		}
		  else
		{
			$hora_array = explode(':', $hora);
			return $hora_array[0].'h'.$hora_array[1];
		}
	}
	else
	{
		if((!$hora)|| ($hora=='00:00:00'))
		{
			return '';
		}
		  else
		{
			$hora_array = explode(':', $hora);
			return $hora_array[0].':'.$hora_array[1];
		}
	}
}


/**
 * Formata as datas para os padr�es brasileiros
 *
 * @access	public
 * @param	string
 * @return	string
 */	 
 
function data($data,$tipo='P'){
	if($tipo == 'P'){
		if((!$data)|| ($data=='1501-01-01')) return '';
	else{
		$data_2 = explode("-",$data);
		return "$data_2[2]/$data_2[1]/$data_2[0]";}
	}elseif($tipo == 'T'){
		if(!$data){
			return '1501-01-01';
		}else{
			$data_array= explode("/",$data);
			return "$data_array[2]-$data_array[1]-$data_array[0]";       
		}
	}
}

	/*
		Fun��es sub_data() e som_data()
		Desenvolvidas por
		InFog (Evaldo Junior Bento)
		em Junho de 2007
		junior_pd_bento@yahoo.com.br
		Este script � disponibilizado utilizando
		a licen�a GPL em sua vers�o mais atual.
		Distribua, aprenda, ensine
		mas mantenha os cr�ditos do autor
		Viva ao Software Livre e � livre informa��o
	*/
	
	/*
		Fun��o sub_data()
		Esta fun��o recebe a data no formato brasileiro dd/mm/AAAA
		e o n�mero de dias que ser�o subtra�dos dela.
		Certifique-se de checar se a data � v�lida antes de chamar a fun��o
	*/
	
	function sub_data($data, $dias)
	{
		$data_e = explode("/",$data);
		$data2 = date("m/d/Y", mktime(0,0,0,$data_e[1],$data_e[0] - $dias,$data_e[2]));
		$data2_e = explode("/",$data2);
		$data_final = $data2_e[1] . "/". $data2_e[0] . "/" . $data2_e[2];
		return $data_final;
	}
	
	/*
		Fun��o som_data()
		Esta fun��o recebe a data no formato brasileiro dd/mm/AAAA
		e o n�mero de dias que ser�o adicionados � dela.
		Certifique-se de checar se a data � v�lida antes de chamar a fun��o
	*/
	
	function som_data($data, $dias)
	{
		$data_e = explode("/",$data);
		$data2 = date("m/d/Y", mktime(0,0,0,$data_e[1],$data_e[0] + $dias,$data_e[2]));
		$data2_e = explode("/",$data2);
		$data_final = $data2_e[1] . "/". $data2_e[0] . "/" . $data2_e[2];
		return $data_final;
	}


?>