<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view(URL_PREFIX.'login/index');
	}
	
	public function entrar()
	{
		$username = $this->input->post('usr_nome');
		$userpass = $this->input->post('usr_senha');
		if((empty($username)) || (empty($userpass)))
		{
			echo FALSE;
		}else{
			if($this->auth->entrar($username,$userpass))
			{
				echo TRUE;
			}else{
				echo FALSE;
			}
		}
	}
	public function valida()
	{
		/*if($this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX.'inicio', 'location');
		}else{
			redirect(URL_PREFIX, 'location');
		}*/
		
		//echo '**** '.$this->auth->esta_autenticado();
		echo $this->session->userdata('rmtlj_auth');
	}
}