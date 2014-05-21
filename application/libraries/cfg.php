<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Classe para montagem de menu
*
* @package		Auth
* @subpackage	Libraries
* @category		Autenticacao
* @author		Barbosa, Renato Costa
*/

class Cfg
{
	var $login_error = false;

	/*
	 * Construtor
	 */
	function Cfg()
	{
		$this->CI =& get_instance();
		$this->d_menu = array('m1' => array('id' => '1',
													'txt'   => 'Conteúdos',
													'icon'  => '1.jpg',
													'js'    => '',
													'css'   => '',
													'link'  => 'conteudos',
													'subm'  => array('s1' => array('id'     => 'ghp_menu_sessao',
																				   'status' => 'on',
																				   'txt'    => 'Sessão',
																				   'link'   => 'sessao'),
																	 's2' => array('id'     => 'ghp_menu_subsessao',
																				   'status' => 'on',
																				   'txt'    => 'Subsessão',
																				   'link'   => 'subsessao'),
																	 's3' => array('id'     => 'ghp_menu_conteudos',
																				   'status' => 'on',
																				   'txt'    => 'Conteúdos',
																				   'link'   => 'conteudos')),
													'sts'   => 'on',
													'extra' => ''),
							  'm2' => array('id' => '1',
													'txt'   => 'Administração',
													'icon'  => '2.jpg',
													'js'    => '',
													'css'   => '',
													'link'  => 'administracao',
													'subm'  => array('s1' => array('id'     => 'ghp_menu_usuarios',
																				   'status' => 'on',
																				   'txt'    => 'Usuários',
																				   'link'   => 'usuarios')),
													'sts'   => 'on',
													'extra' => '')
							  );
	}
	
	/*
	 * retorna a base para menus
	 * tipo: geral ou principal
	 */
	public function menu($ret = FALSE)
	{
		$c_tipo_user = $this->CI->auth->c_tipo;
		
		$ret = '<ul id="gph_menu" class="gph_menu">';
		foreach($this->d_menu as $m):
			if($m['sts'] == 'on'):
				$ret .= '<li>
						 	<a href="javascript:void(0)">
							<img src="'.base_url('sites/admin/_images/menu/'.$m['icon']).'" alt=""/>
							<span class="gph_active"></span>
							<span class="gph_wrap">
								<span class="gph_link">'.$m['txt'].'</span>
								<span class="gph_descr"></span>
							</span>
							</a>';
				if(count($m['subm']) > 0):
					$ret .= '<div class="gph_box">';
					foreach($m['subm'] as $sm):
						if($sm['status'] == 'on'):
							$ret .= '<a href="'.site_url(URL_PREFIX.$sm['link']).'">'.$sm['txt'].'</a>';
						endif;
					endforeach;
					$ret .= '</div>';
				endif;
				$ret .= '</li>';
			endif;
		endforeach;
		
		$ret .= '<li>
                <a href="'.site_url(URL_PREFIX.'login/sair').'" onclick="return confirm(\'Encerrar a sess&atilde;o?\')">
                    <img src="'.base_url('sites/admin/_images/menu/4.jpg').'" alt=""/>
                    <span class="gph_active"></span>
                    <span class="gph_wrap">
                        <span class="gph_link">Sair</span>
                        <span class="gph_descr"></span>
                    </span>
                </a>
                </li>';
				
		$ret .= '</ul>';
		
		return $ret;
	}
}
?>
