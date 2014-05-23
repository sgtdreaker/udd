<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu'), 
																	   'js' => array('default')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'administracao'));
			$this->load->view(URL_PREFIX.'usuarios/index');
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	
	public function cadastrar()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu'), 
																	   	   'js' => array('default', 'jquery.mask.min', 'usuarios')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'administracao'));
			$this->load->view(URL_PREFIX.'usuarios/cadastrar');
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	public function cadastrarout()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu'), 
																	   	   'js' => array('default', 'usuarios')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'administracao'));
			
			
			/*
			 * recebendo os dados postados
			 */
			$ipt_nome          = $this->input->post('ipt_nome');
			$ipt_email         = $this->input->post('ipt_email');
			$ipt_senha         = $this->input->post('ipt_senha');
			$ipt_confirmasenha = $this->input->post('ipt_confirmasenha');
			$ipt_endereco      = $this->input->post('ipt_endereco');
			$ipt_bairro        = $this->input->post('ipt_bairro');
			$ipt_cidade        = $this->input->post('ipt_cidade');
			$ipt_estado        = $this->input->post('ipt_estado');
			$ipt_dddfone       = $this->input->post('ipt_dddfone');
			$ipt_fone          = $this->input->post('ipt_fone');
			$ipt_dddcelular    = $this->input->post('ipt_dddcelular');
			$ipt_celular       = $this->input->post('ipt_celular');
			
			/*
			 * adicionando dados na tabela
			 */
			 $matriz = array('c_email'    => $ipt_email,
							 'c_usuario'  => $ipt_email,
							 'c_nome'     => $ipt_nome,
							 'c_senha'    => md5($ipt_senha),
							 'c_tipo'     => 'user',
							 'c_registro' => date('Y-m-d'),
							 'c_status'   => 'inativo');
			 $dados = $this->gph_crud->adiciona(DB_PREFIX.'usuarios', $matriz, array('n_cod,desc'));
			 
			 $mdados = array('n_cod_usuario'    => $dados[0]['n_cod'],
							 'c_endereco'       => $ipt_endereco,
							 'c_bairro'         => $ipt_bairro,
							 'c_cidade'         => $ipt_cidade,
							 'c_estado'         => $ipt_estado,
							 'n_fone_ddd'       => $ipt_dddfone,
							 'c_fone_numero'    => $ipt_fone,
							 'n_celular_ddd'    => $ipt_dddcelular,
							 'c_celular_numero' => $ipt_celular);
			$this->gph_crud->adiciona(DB_PREFIX.'usuarios_dados', $mdados);
			
			/*
			 * liberando permissões
			 */
			 $this->gph_crud->adiciona(DB_PREFIX.'permissoes', array('n_cod_user'  => $dados[0]['n_cod'],
																	 'c_sessao'    => 'inicio',
																	 'c_subsessao' => 'menu',
																	 'c_acao'      => 'cadastrar'));
																	 
			 $this->gph_crud->adiciona(DB_PREFIX.'permissoes', array('n_cod_user'  => $dados[0]['n_cod'],
																	 'c_sessao'    => 'login',
																	 'c_subsessao' => 'valida',
																	 'c_acao'      => 'entrar'));
																	 
			 $this->gph_crud->adiciona(DB_PREFIX.'permissoes', array('n_cod_user'  => $dados[0]['n_cod'],
																	 'c_sessao'    => 'valida',
																	 'c_subsessao' => 'menu',
																	 'c_acao'      => 'entrar'));
			
			$this->load->view(URL_PREFIX.'templates/retorno', array('msg_titulo'  => 'Cadastro de Usuários',
																	'msg_retorno' => 'Usuário cadastrado com sucesso.'));
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	
	public function valida_email()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			$email = $this->input->post('ipt_email');
			$valida_email = $this->gph_crud->buscar(DB_PREFIX.'usuarios', 'sql', array('c_email' => $email));
			if($valida_email->num_rows() > 0)
			{
				echo TRUE;
			}else{
				echo FALSE;
			}
		}
	}
	
	/*
	 * realiza as alterações no cadastro
	 */
	public function alterar()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu', 'usuarios'), 
																	   	   'js' => array('default', 'usuarios')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'administracao'));
			
			
			// recebendo a pagina atual
				$pageAtual = $this->uri->segment(4);
				if(empty($pageAtual)){ $pageAtual = 0; }
			// gerando sql para paginar a busca
				$contaUsuario = $this->gph_crud->buscar(DB_PREFIX.'usuarios', 'sql', array());

			// configuracoes da paginacao
				$config['base_url'] = base_url(URL_PREFIX.'usuarios/alterar');
				$config['total_rows'] = $contaUsuario->num_rows();
				$config['per_page'] = 15;
				$config['full_tag_open'] = '<div class="paginacao">';
				$config['full_tag_close'] = '</div>';
				$config['uri_segment'] = 4;
				$config['first_link'] = 'primeira';
				$config['last_link'] = '&uacute;ltima';
				$config['prev_link'] = '&laquo;';
				$config['next_link'] = '&raquo;';
				
			// buscando sessoes cadastradas e paginando
				$data['usuarios'] = $this->gph_crud->getDados($config['per_page'], $pageAtual, 
															  DB_PREFIX.'usuarios', 
															  array(), 
															  array('c_nome,asc'));
					
				$this->pagination->initialize($config);	
				
			$data['links'] = $this->pagination->create_links();			
			$this->load->view(URL_PREFIX.'usuarios/alterar', $data);
			
			
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	
	/*
	 * realiza as alterações no cadastro
	 */
	public function alterar_usuario()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu', 'usuarios'), 
																	   	   'js' => array('default', 'usuarios')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'administracao'));
			
			$this->load->view(URL_PREFIX.'usuarios/alterar');
			
			
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	
	/*
	 * listando permissoes
	 */
	public function permissoes()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			$n_cod_user = $this->input->post('n_cod_user');
			if($n_cod_user)
			{
				echo $this->cfg->permissoes($n_cod_user);
			}else{
				echo 'Não foi possível localizar dados';
			}
		}
	}
	/*
	 * setando as permissoes
	 */
	public function seta_permissoes()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			$n_cod_user = $this->input->post('n_cod_user');
			$local      = $this->input->post('local');
			$sessao     = $this->input->post('sessao');
			$acao       = $this->input->post('acao');

			$matriz = array('n_cod_user'  => $n_cod_user,
							'c_sessao'    => $local,
							'c_subsessao' => $sessao,
							'c_acao'      => $acao);
			$valida = $this->gph_crud->buscar(DB_PREFIX.'permissoes', 'sql', $matriz);
			if($valida->num_rows() > 0)
			{
				$this->gph_crud->excluir(DB_PREFIX.'permissoes', $matriz);
				echo '<img src="'.base_url('sites/admin/_images/botoes/auto_off.jpg').'" width="66" height="28" />';
			}else{
				$this->gph_crud->adiciona(DB_PREFIX.'permissoes', $matriz);
				echo '<img src="'.base_url('sites/admin/_images/botoes/auto_on.jpg').'" width="66" height="28" />';
			}
		}
	}
}