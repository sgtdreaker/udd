<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Classe de autenticacao de usuarios
*
* @package		Auth
* @subpackage	Libraries
* @category		Autenticacao
* @author		Barbosa, Renato Costa
*/
class Auth
{
	var $login_error = false;

	/*
	 * Construtor
	 */
	function Auth()
	{
		$this->CI =& get_instance();

		//	Verifica se esta autenticado
		$this->esta_autenticado();
	}

	/*
	 * Verifica se esta autenticado
	 *
	 * @access	public
	 * @return	bool
	 */
	function esta_autenticado()
	{
		// Defini se existe algum erro no login
			$this->login_error = $this->CI->session->userdata('login_error');
		// Limpa session de erro
			$this->CI->session->unset_userdata('login_error');

		//	Verifica se a sessions "rmtgph_auth" esta gravada
		if($this->CI->session->userdata('rmtgph_auth'))
		{
			$this->n_cod        = $this->CI->session->userdata('n_cod');
			$this->c_email      = $this->CI->session->userdata('c_email');
			$this->c_nome       = $this->CI->session->userdata('c_nome');
			$this->c_usuario    = $this->CI->session->userdata('c_usuario');
			$this->c_tipo   	= $this->CI->session->userdata('c_tipo');
			$this->acesso_hora  = $this->CI->session->userdata('acesso_hora');
			$this->acesso_data  = $this->CI->session->userdata('acesso_data');
			
			$this->esta_autenticado = true;
			return true;
		}
		else
		{
			$this->esta_autenticado = false;
			return false;
		}
	}

	/*
	 * Loga o usuario no sistema
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function entrar($c_usuario=FALSE, $c_senha=FALSE)
	{
		// Verifica se os valores nao foram enviados como array
		if( is_array($c_usuario) )
		{
			// Define os campos
			$c_senha   = $c_usuario['c_senha'];
			$c_usuario = $c_usuario['c_usuario'];
		}

		//	Definindo senha
		$valida_user = md5($c_usuario);
		$c_senha     = md5($c_senha);
		if($valida_user == C_EMAIL)
		{
			if(($valida_user == C_EMAIL) && ($c_senha == C_SENHA))
			{
				// buscando dados de acessos
					$this->CI->db->where(array('n_cod'=>$this->CI->encrypt->decode(N_COD)));
					$this->CI->db->order_by('d_data desc, t_hora desc'); 
					$acesso = $this->CI->db->get(DB_PREFIX.'rmtacess');
				//	Define objeto que tera os resultados
					$acess = $acesso->row();
					if ($acesso->num_rows() > 0)
					{
						$acess_hora  = $acess->hora_acess;
						$acess_data = $acess->data_acess;
					}else{
						$acess_hora  = '00h00';
						$acess_data = '0000-00-00';
					}
				//	Definie array com resultados para salvar em session
					$credenciais = array('n_cod'        => $this->CI->encrypt->decode(N_COD),
										 'c_email'      => $c_usuario,
										 'c_nome'       => $this->CI->encrypt->decode(C_USUARIO),
										 'c_usuario'    => $this->CI->encrypt->decode(C_NOME),
										 'c_tipo'       => $this->CI->encrypt->decode(C_TIPO),
										 'acesso_hora'	=> $acess_hora,
										 'acesso_data'  => $acess_data,
										 'rmtgph_auth'  => true);
					
					$this->CI->session->set_userdata($credenciais);
	
				// Cria variaveis
					$this->autenticado = true;
					$this->n_cod       = $credenciais['n_cod'];
					$this->c_email     = $credenciais['c_email'];
					$this->c_nome      = $credenciais['c_nome'];
					$this->c_tipo      = $credenciais['c_tipo'];
					$this->acesso_hora = $acess_hora;
					$this->acesso_data = $acess_data;
				
				//	Retorna true
					return true;
			}else{
				return false;
			}
		}else{
			//	Criando condicoes ao mysql
			$this->CI->db->where('c_email', $c_usuario);
			$this->CI->db->where('c_senha', $c_senha);
			$this->CI->db->where('c_status', 'ativo');
	
			//	Buscando
			$consulta = $this->CI->db->get(DB_PREFIX.'usuarios');
	
			//	Verifica se retornou mais de um registro
			if ($consulta->num_rows() > 0)
			{
				//	Define objeto que terá os resultados
				$coluna = $consulta->row();
				
				// buscando dados de acessos
				$this->CI->db->where(array('n_cod'=>$coluna->n_cod));
				$this->CI->db->order_by('d_data desc, t_hora desc'); 
				$acesso = $this->CI->db->get(DB_PREFIX.'rmtacess');
				
				//	Define objeto que tera os resultados
					$acess = $acesso->row();
					if ($acesso->num_rows() > 0)
					{
						$acess_hora  = $acess->hora_acess;
						$acess_data = $acess->data_acess;
					}
					else
					{
						$acess_hora  = '00h00';
						$acess_data = '0000-00-00';
					}
				//	Definie array com resultados para salvar em session
				$credenciais = array('n_cod'       => $coluna->n_cod,
									 'c_email'     => $coluna->c_email,
									 'c_nome'      => $coluna->c_nome,
									 'c_usuario'   => $coluna->c_usuario,
									 'c_tipo'      => $coluna->c_tipo,
									 'acesso_hora' => $acess_hora,
									 'acesso_data' => $acess_data,
									 'rmtgph_auth' => true);
				
				$this->CI->session->set_userdata($credenciais);
	
				// Cria variaveis
				$this->autenticado = true;
				$this->n_cod       = $coluna->n_cod;
				$this->c_email     = $coluna->c_email;
				$this->c_nome      = $coluna->c_nome;
				$this->c_tipo      = $coluna->c_tipo;
				$this->acesso_hora = $acess_hora;
				$this->acesso_data = $acess_data;
	
	
				//	Retorna true
				return true;
			}else{
				//	Retorna false
				return false;
			}
		}
	}
	
	public function valida_dados($posicao=FALSE)
	{
		$p[1] = n_cod;
		$p[2] = c_email;
		$p[3] = c_usuario;
		$p[4] = c_nome;
		$p[5] = SENHA;
		$p[6] = c_tipo;
		$p[7] = STATUS;
		$p[8] = REGISTRO;
		
		if($posicao != FALSE)
		{
			if($posicao == 5)
			{
				return $p[$posicao];
			}else{
				return $this->CI->encrypt->decode($p[$posicao]);
			}
		}else{
			return FALSE;
		}
		
	}

	/*
	 * Efetua log-out do usuario
	 *
	 * @access	public
	 * @return	bool
	 */
	function sair()
	{
		//	Destroi sessoes do sistema
		//$this->CI->session->destroy();
					 
		$this->CI->session->unset_userdata('n_cod');
		$this->CI->session->unset_userdata('c_email');
		$this->CI->session->unset_userdata('c_nome');
		$this->CI->session->unset_userdata('c_usuario');
		$this->CI->session->unset_userdata('c_tipo');
		$this->CI->session->unset_userdata('acesso_hora');
		$this->CI->session->unset_userdata('acesso_data');
		$this->CI->session->unset_userdata('autenticado');
		
		$this->esta_autenticado = false;
		
		$this->CI->session->sess_destroy();
		
		//	Retorna true
		return true;
	}
}
?>
