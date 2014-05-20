<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Classe de autenticacao de usuarios
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
		
		$this->principal = array('usuarios' => array('id'    => '1',
													 'txt'   => 'Usuários',
													 'icon'  => 'user',
													 'js'    => '',
													 'css'   => '',
													 'link'  => 'usuarios',
													 'subm'  => array('s1' => array('id'     => 'cadastrar',
																					'status' => 'on',
																					'txt'    => 'Cadastar',
																					'link'   => 'cadastrar'),
																	  's2' => array('id'     => 'alterar',
																					'status' => 'on',
																					'txt'    => 'Alterar',
																					'link'   => 'alterar'),
																	  's3' => array('id'     => 'excluir',
																					'status' => 'on',
																					'txt'    => 'Excluir',
																					'link'   => 'excluir')),
													 'sts'   => 'on',
													 'extra' => '')
								  );
	    $this->geral = array('m1' => array('id'    => 'inicio',
										   'txt'   => 'Início',
										   'icon'  => 'home',
										   'js'    => '',
										   'css'   => '',
										   'link'  => 'inicio',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm2' => array('id'    => 'vendas',
										   'txt'   => 'Vendas',
										   'icon'  => 'inbox',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm3' => array('id'    => 'catalogo',
										   'txt'   => 'Catálogo',
										   'icon'  => 'tags',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm5' => array('id'    => 'clientes',
										   'txt'   => 'Clientes',
										   'icon'  => 'user',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm6' => array('id'    => 'promocoes',
										   'txt'   => 'Promoções',
										   'icon'  => 'star-empty',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm7' => array('id'    => 'newslatters',
										   'txt'   => 'Newslatters',
										   'icon'  => 'envelope',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm8' => array('id'    => 'cms',
										   'txt'   => 'CMS',
										   'icon'  => 'th',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => ''),
						     'm9' => array('id'    => 'relatorios',
										   'txt'   => 'Relatórios',
										   'icon'  => 'list-alt',
										   'js'    => '',
										   'css'   => '',
										   'link'  => '',
										   'sts'   => 'on',
										   'extra' => '')
						   );
	}
	
	/*
	 * retorna a base para menus
	 * tipo: geral ou principal
	 */
	public function menu($tipo='geral', $ret = FALSE)
	{
		$c_tipo_user = $this->CI->auth->c_tipo;
		if($tipo == 'principal')
		{
			$base = $this->base('principal');
			$ret .= '<div class="dropdown">
					  <a id="drop_principal" class="header__topo--principal" href="#" data-toggle="dropdown" role="button">
						Administração&nbsp;&nbsp;<b class="caret"></b>
					  </a>';
			// para nivel de usuarios
			$b = $base;
			$p = 1;
			if(count($b) > 0):
				$ret .= '<ul id="menu2" class="dropdown-menu" aria-labelledby="drop_principal" role="menu">';
				foreach($b as $r):
					if($r['sts'] == 'on'):
						$ret .= '<li role="presentation">
									<a href="'.site_url(URL_PREFIX.$r['link']).'" tabindex="-'.$p.'" role="menuitem">
										<span class="glyphicon glyphicon-'.$r['icon'].'"></span> '.$r['txt'].'
									</a>
								 </li>';
						$p++;
					endif;
				endforeach;
				$ret .= '<li role="presentation">
							<a href="'.site_url(URL_PREFIX.'login/sair').'" tabindex="-'.$p.'" role="menuitem">
								<span class="glyphicon glyphicon-off"></span> Sair
							</a>
						 </li>';
				$ret .= '</ul>';
			endif;
			$ret .= '</div>';
		}
		elseif($tipo == 'geral')
		{
			$base = $this->base('geral');
			$ret .= '<nav class="header__menu"><ul>';
			foreach($base as $r):
				if($r['sts'] == 'on'):
					$ret .= '<li>
								<a href="'.site_url(URL_PREFIX.$r['link']).'">
									<span class="glyphicon glyphicon-'.$r['icon'].' btn-lg"></span><br />
									'.$r['txt'].'
								 </a>
							 </li>';
				endif;
			endforeach;
			$ret .= '</ul></nav>';
			
		}
		
		return $ret;
		
	}
	
	/*
	 * retorna os dados para submenu
	 * tipo: geral ou principal
	 */
	public function submenu($tipo='geral', $sessao=FALSE, $retorno=FALSE)
	{
		if($tipo == 'geral')
		{
			if($sessao != FALSE)
			{
				$principal = $this->principal;
				$princ = $principal[$sessao]['subm'];
				$retorno = '<nav class="conteudos__menu"><h1>Menu Principal</h1>';
				foreach($princ as $p):
					if($p['status'] == 'on')
					{
						$retorno .= '<a href="'.site_url(URL_PREFIX.$sessao.'/'.$p['link']).'">'.$p['txt'].'</a>';
					}
				endforeach;
				$retorno .= '</nav>';
			}
			return $retorno;
		}
	}
	
	private function base($volta = 'geral')
	{
		if($volta == 'principal')
		{
			return $this->principal;
		}else{
			return $this->geral;
		}
	}


	public function servicos($ret=FALSE, $p=2)
	{
		
		$ljrmt_txtservico = $this->CI->session->userdata('ljrmt_txtservico');
		if(empty($ljrmt_txtservico)):
			$ljrmt_txtservico = 'Padrão';
		endif;
		
		$this->CI->db->select('*');
		$this->CI->db->from('lj_servicos');
		$this->CI->db->where(array('c_status' => 'ativo'));
		$this->CI->db->order_by('c_nome', 'ASC');
		$sql = $this->CI->db->get();
		if($sql->num_rows() > 0)
		{
			$ret .= 'Informações do serviço: <div class="dropdown">
					  <a id="drop_servicos" class="header__topo--servicos" href="#" data-toggle="dropdown" role="button">
						<b>
							'.$ljrmt_txtservico.' 
							 <span class="badge">'.$sql->num_rows().'</span>
						</b>&nbsp;&nbsp;
						<b class="caret"></b>
					  </a>';
				$ret .= '<ul id="menuservicos" class="dropdown-menu" aria-labelledby="drop_servicos" role="menuservicos">';
				$ret .= '<li role="presentation">
							<a href="'.site_url(URL_PREFIX.'inicio/altera/padrao').'" tabindex="-1" role="menuitem">
								Padrão
							</a>
						 </li>';
				foreach($sql->result() as $s):
					$ret .= '<li role="presentation">
								<a href="'.site_url(URL_PREFIX.'inicio/altera/'.$s->c_link).'" tabindex="-'.$p.'" role="menuitem">
									'.$s->c_nome.'
								</a>
							 </li>';
					$p++;
				endforeach;
				$ret .= '</ul>';
			$ret .= '</div>';
		}else{
			$ret = 'Informações do serviço:<br /><b>Padrão</b>';
		}
		return $ret;
	}
}
?>
