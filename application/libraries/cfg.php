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
													'subm'  => array('s1' => array('id'      => 'ghp_menu_sessao',
																				   'status'  => 'on',
																				   'txt'     => 'Sessão',
																				   'link'    => 'sessao',
																				   'padrao'  => 'conteudos',
																				   'submenu' => array('m1' => array('id'   => 'sbm_cadastro',
																				   									'perm' => 'cadastro',
																													'txt'  => 'Cadastrar',
																													'link' => 'sessao/cadastrar',
																													'sts'  => 'on'),
																									  'm2' => array('id'   => 'sbm_alterar',
																				   									'perm' => 'alterar',
																													'txt'  => 'Alterar',
																													'link' => 'sessao/alterar',
																													'sts'  => 'on'),
																									  'm3' => array('id'   => 'sbm_excluir',
																				   									'perm' => 'excluir',
																													'txt'  => 'Excluir',
																													'link' => 'sessao/excluir',
																													'sts'  => 'on')),
																				   ),
																	 's2' => array('id'      => 'ghp_menu_subsessao',
																				   'status'  => 'on',
																				   'txt'     => 'Subsessão',
																				   'link'    => 'subsessao',
																				   'padrao'  => 'conteudos',
																				   'submenu' => array('m1' => array('id'   => 'sbm_cadastro',
																				   									'perm' => 'cadastro',
																													'txt'  => 'Cadastrar',
																													'link' => 'subsessao/cadastrar',
																													'sts'  => 'on'),
																									  'm2' => array('id'   => 'sbm_alterar',
																				   									'perm' => 'alterar',
																													'txt'  => 'Alterar',
																													'link' => 'subsessao/alterar',
																													'sts'  => 'on'),
																									  'm3' => array('id'   => 'sbm_excluir',
																				   									'perm' => 'excluir',
																													'txt'  => 'Excluir',
																													'link' => 'subsessao/excluir',
																													'sts'  => 'on')
																				   					 )
																				   ),
																	 's3' => array('id'      => 'ghp_menu_conteudos',
																				   'status'  => 'on',
																				   'txt'     => 'Conteúdos',
																				   'link'    => 'conteudos',
																				   'padrao'  => 'conteudos',
																				   'submenu' => array('m1' => array('id'   => 'sbm_cadastro',
																				   									'perm' => 'cadastro',
																													'txt'  => 'Cadastrar',
																													'link' => 'conteudos/cadastrar',
																													'sts'  => 'on'),
																									  'm2' => array('id'   => 'sbm_alterar',
																				   									'perm' => 'alterar',
																													'txt'  => 'Alterar',
																													'link' => 'conteudos/alterar',
																													'sts'  => 'on'),
																									  'm3' => array('id'   => 'sbm_excluir',
																				   									'perm' => 'excluir',
																													'txt'  => 'Excluir',
																													'link' => 'conteudos/excluir',
																													'sts'  => 'on')))
																				   ),
													'sts'   => 'on',
													'extra' => ''),
							  'm2' => array('id' => '1',
													'txt'   => 'Administração',
													'icon'  => '2.jpg',
													'js'    => '',
													'css'   => '',
													'link'  => 'administracao',
													'subm'  => array('s1' => array('id'      => 'ghp_menu_usuarios',
																				   'status'  => 'on',
																				   'txt'     => 'Usuários',
																				   'link'    => 'usuarios',
																				   'padrao'  => 'administracao',
																				   'submenu' => array('m1' => array('id'   => 'sbm_cadastro',
																				   									'perm' => 'cadastro',
																													'txt'  => 'Cadastrar',
																													'link' => 'usuarios/cadastrar',
																													'sts'  => 'on'),
																									  'm2' => array('id'   => 'sbm_alterar',
																				   									'perm' => 'alterar',
																													'txt'  => 'Alterar',
																													'link' => 'usuarios/alterar',
																													'sts'  => 'on'),
																									  'm3' => array('id'   => 'sbm_excluir',
																				   									'perm' => 'excluir',
																													'txt'  => 'Excluir',
																													'link' => 'usuarios/excluir',
																													'sts'  => 'on')))
																	),
													'sts'   => 'on',
													'extra' => '')
							  );
	}
	
	/*
	 * retorna a base para menus
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
	
	/*
	 * retorna a base para submenus
	 * local: sessao onde devo procurar
	 */
	public function submenu($local = FALSE)
	{
		$sessao = $this->CI->uri->segment(2);
		foreach($this->d_menu as $m):
			if($m['link'] == $local):
				foreach($m['subm'] as $sm):
					if(($m['link'] == $local) && ($sm['padrao'] == $local) && ($sm['link'] == $sessao)):
						echo '<div class="gph_intsubmenu"><!--<h1>Menu de Ações</h1>--><ul>';
						foreach($sm['submenu'] as $smshow):
							if($smshow['sts'] == 'on'):
								echo '<li><a href="'.site_url(URL_PREFIX.$smshow['link']).'" id="'.$smshow['id'].'" class="btn">'.$smshow['txt'].'</a></li>';
							endif;
						endforeach;
						echo '</ul></div>';
					endif;
				endforeach;
			endif;
		endforeach;
	}
	
	/*
	 * listagem de todas as sessoes para liberar permissoes
	 */
	public function permissoes($n_cod_user = FALSE, $ret = FALSE)
	{
		$ret .= '<div class="user_permissoes">';
		foreach($this->d_menu as $m):
			$ret .= '<h3>'.$m['txt'].'</h3>';
			foreach($m['subm'] as $s):
				$ret .= '<ul><li class="sessao_titulo">'.$s['txt'].'</li>';
				foreach($s['submenu'] as $ac):
					$ret .= '<li>
							 	<span>'.$ac['txt'].'</span>
							 	<a href="javascript:perm(\''.$n_cod_user.'\',\''.$m['link'].'\',\''.$s['link'].'\',\''.$ac['perm'].'\')" 
								   id="sbm_'.$s['link'].'_'.$ac['perm'].'_'.$n_cod_user.'">
									<img src="'.base_url('sites/admin/_images/botoes/auto_off.jpg').'" width="66" height="28" />
								</a>
							 </li>';
				endforeach;
				$ret .= '</ul>';
			endforeach;
			$ret .= '<div class="limpa"></div>';
		endforeach;
		$ret .= '</div>';
		$ret .= form_open('', array('name'=>'set_emp', 'id'=>'set_emp'));
		$ret .= '<input type="hidden" name="n_cod_user" id="set_n_cod_user" value="" />
				 <input type="hidden" name="local"      id="set_local" value="" />
				 <input type="hidden" name="sessao"     id="set_sessao" value="" />
				 <input type="hidden" name="acao"       id="set_acao" value="" />';
		$ret .= form_close();
		return $ret;
	}
	
}
?>
