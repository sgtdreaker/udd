<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subsessao extends CI_Controller {

	public function index()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu'), 
																	   'js' => array('default')));
			$this->load->view(URL_PREFIX.'templates/abrir_layinterna', array('local' => 'conteudos'));
			$this->load->view(URL_PREFIX.'conteudos/index');
			$this->load->view(URL_PREFIX.'templates/fechar_layinterna');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
}