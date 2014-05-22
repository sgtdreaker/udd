<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default', 'menu'), 
																	   'js' => array('default')));
			$this->load->view(URL_PREFIX.'inicio/index');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
}