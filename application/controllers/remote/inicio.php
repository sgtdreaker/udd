<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			
			$this->load->view(URL_PREFIX.'templates/estrutura_abre', array('css' => array('default'), 
																	   'js' => array('default')));
			$this->load->view(URL_PREFIX.'inicio/index');
			$this->load->view(URL_PREFIX.'templates/estrutura_fecha');
		}
	}
	
	public function altera()
	{
		if(!$this->auth->esta_autenticado())
		{
			redirect(URL_PREFIX, 'location');
		}else{
			$c_link = $this->uri->segment(4);
			if($c_link)
			{
				if($c_link == 'padrao')
				{
					$this->session->set_userdata(array('gphrmt_txtservico' => '',
													   'gphrmt_codservico' => ''));
				}else{
					$servico = $this->gph_crud->buscar('gph_servicos', 'sql', array('c_link' => $c_link));
					if($servico->num_rows() > 0):
						$servico = $servico->result_array();
						$this->session->set_userdata(array('gphrmt_txtservico' => $servico[0]['c_nome'],
														   'gphrmt_codservico' => $servico[0]['n_cod']));
					endif;
				}
			}
			redirect(URL_PREFIX.'inicio', 'location');
		}
	}
}