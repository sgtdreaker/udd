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
}