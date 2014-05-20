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
class Gph_detecta {
	// variaveis de ambiente
	/**
	 * Classe construtora da classe gph_detecta
	 *
	 */
	public function __construct()
	{
		// recuperando as variaveis de ambiente
			$this->CI =& get_instance();
	
			log_message('debug', "Classe gph_detecta iniciada");
		
		// iniciando a classe origem
			$this->origem();
	}

	// --------------------------------------------------------------------

	/**
	 * retorna a origem do acesso [ desktop, mobile, ipad ou iphone]
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	public function origem($ori=false)
	{
		if($this->CI->mobile_detect->isTablet())
		{
			$this->origem = 'tablet';
		}
		elseif($this->CI->mobile_detect->isMobile())
		{
			$this->origem = 'mobile';
		}
		else
		{
			$this->origem = 'desktop';
		}
		
		define('ORIGEM', $this->origem.'/');
		
		/*if($this->CI->agent->is_mobile())
		{
			if($this->CI->agent->is_mobile('iphone'))
			{
				$this->origem = 'iphone';
			}elseif($this->CI->agent->is_mobile('ipad')){
				$this->origem = 'ipad';
			}else{
				$this->origem = 'mobile';
			}
		}else{
			$this->origem = 'desktop';
		}
		
		define('ORIGEM', 'desktop/');
		
		if(empty($this->origem))
		{
			define('ORIGEM', 'desktop/');
		}else{
			define('ORIGEM', $this->origem.'/');
		}*/
	}

}
// Final da classe gph_detecta

/* End of file gph_detecta.php */
/* Location: libraries/gph_detecta.php */