<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
/**
 * Classe inicializacao dos documentos
 *
 * @package		Gopublish
 * @subpackage	Libraries
 * @category	Inits
 * @author		Barbosa, Renato Costa
 * @link		null
 */
class Inits {
	// variaveis de ambiente

	var $local = BASE_CLIENT;
	/**
	 * Classe construtora do menu
	 *
	 * apenas inicia o menu e seus construtores
	 */
	public function __construct()
	{
		// recuperando as variaveis de ambiente
		$this->CI =& get_instance();

		log_message('debug', "Classe inits iniciada");
	}

	// --------------------------------------------------------------------

	/**
	 * apenas escreve o inits do css
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	public function init_css($matriz = FALSE, $local = 'admin')
	{
		if(DEBUG)
		{
			$ale = '?='.rand(1,999999);
		}else{
			$ale = '';
		}
		//echo "<link rel=\"stylesheet\" href=\"".BASE_ISSET."media/css/".$local."/reset.css\" type=\"text/css\" media=\"all\">\n";
		if(is_array($matriz))
		{
			foreach($matriz as $m):
				echo "<link rel=\"stylesheet\" href=\"".BASE_ISSET."media/css/".$local."/".$m.".css".$ale."\" type=\"text/css\" media=\"all\">\n";
			endforeach;
		}
	}


	/**
	 * apenas escreve o inits do js
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	public function init_js($matriz = FALSE, $local = 'admin')
	{
		if(DEBUG)
		{
			$ale = '?='.rand(1,999999);
		}else{
			$ale = '';
		}
		if(is_array($matriz))
		{
			foreach($matriz as $m):
				echo "<script language=\"javascript\" src=\"".BASE_ISSET."media/js/".$local."/".$m.".js".$ale."\"></script>\n";
			endforeach;
		}
	}
	/**
	 * traca o caminho do usuario
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	public function trace($trace=false, $totalpos=false, $link=false, $conta=1)
	{
		$path = $this->CI->uri->segment_array();

		$totalpos = count($path)-1;
		$trace .= '<a href="'.BASE_ISSET().'">home</a>&nbsp;&raquo;&nbsp;';
		foreach($path as $p):
			$palavra = preg_replace("[^a-zA-Z0-9_]", "", strtr($path[$conta], "_", " "));
			$palavra = preg_replace("[^a-zA-Z0-9_]", "", strtr($palavra, "-", " "));
			$link .= $path[$conta].'/';
			//$trace .= '<a href="'.BASE_ISSET().$link.'">'.$palavra.'</a>';
			if($conta<=$totalpos)
			{
				$trace .= '<a href="'.BASE_ISSET().$link.'">'.$palavra.'</a>&nbsp;&raquo;&nbsp;';
				//$trace .= '&nbsp;&raquo;&nbsp;';
			}else{
				$trace .= $palavra;
			}
			$conta++;
		endforeach;
		return $trace;
	}
}
// Final da classe inits

/* End of file inits.php */
/* Location: libraries/inits.php */