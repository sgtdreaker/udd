<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {

/* 
 * Autor: Barbosa, Renato Costa
 * Versão: 1.0 (31/01/2014)
 */

	/*
	* retornando para tela principal do site
	*/
	public function index()
	{
		redirect('','location');
	}

	/*
	* recebendo as folhas de estilo
	*/
	public function css()
	{
		// recebendo arquivo postado
			$local   = $this->uri->segment(3);
			$arquivo = $this->uri->segment(4);
			
		// mudando o header do documento			
			header('Content-type: text/css');
			$days_to_cache = 1;
			header('Expires: '.gmdate('D, d M Y H:i:s',time() + (60 * 60 * 24 * $days_to_cache)).' GMT');
			
		// verificando se foi informado o arquivo
			if(empty($arquivo))
			{
				//retornando para tela principal do site
				redirect('','location');
			}else{
				if(($local != 'admin') && ($local != 'geral'))
				{
					$loc = $local.'/'.ORIGEM;
				}else{
					$loc = $local.'/';
				}
				$file = APPPATH.'views/media/'.$loc.'_css/'.$arquivo;
				if(!file_exists($file))
				{
					echo '<h1>file not found</h1>';
				}else{
					$flocal = 'media/'.$loc.'_css/'.$arquivo;
					$this->load->view($flocal);
				}
			}
	}
	
	/*
	* recebendo os javascripts
	*/
	public function js()
	{
		// recebendo arquivo postado
			$local   = $this->uri->segment(3);
			$arquivo = $this->uri->segment(4);
			
		// mudando o header do documento			
			header('Content-type: application/x-javascript');
			$days_to_cache = 1;
			header('Expires: '.gmdate('D, d M Y H:i:s',time() + (60 * 60 * 24 * $days_to_cache)).' GMT');
			
		// verificando se foi informado o arquivo
			if(empty($arquivo))
			{
				//retornando para tela principal do site
				redirect('','location');
			}else{
				if(($local != 'admin') && ($local != 'geral'))
				{
					$loc = $local.'/'.ORIGEM;
				}else{
					$loc = $local.'/';
				}
				$file = APPPATH.'views/media/'.$loc.'_js/'.$arquivo;
				if(!file_exists($file))
				{
					echo '<h1>file not found</h1>';
				}else{
					$gf = $this->load->view('media/'.$loc.'_js/'.$arquivo);
				}
			}
	}
	
	/*
	* exibindo as imagens
	*/
	public function imagens()
	{
		// recebendo os dados
		$dt = $this->uri->segment_array();
		$local    = $dt[3];
		$sublocal = $dt[4];
		$id       = $dt[5];
		$tamanho  = $dt[6];
		$file     = $dt[7];

		// verificando subdiretorios
		$sub = explode('_', $id);
		if(!empty($sub[1]))
		{
			$sub = false;
			$sub = str_replace("_", "/", $id);
		}else{
			$sub = $id;
		}
		
		// path do arquivo
		$path = BASE_UP.'content/'.$local.'/'.$sublocal.'/'.$sub.'/'.$file;
		//echo $path;
		if(!file_exists($path))
		{
			$path = BASE_UP.'null/'.IMG_NOTFOUND;
		}
		// verificando se existe o arquivo
		if(file_exists($path))
		{
			 // pegando as propriedades da imagem
				 $image_size = getimagesize($path);
			 // pegando a altura da imagem
				 $image_wsize = $image_size[0]; 
				 $image_hsize = $image_size[1]; 
				 
			// carrega a imagem em buffer
				$this->gph_canvas->carrega($path);
			// trabalhando os tamanhos
				$size = explode('x', $tamanho);
				if(!empty($size[1]))
				{
					$this->gph_canvas->redimensiona($size[0], $size[1]);
				}else{
					$this->gph_canvas->redimensiona($tamanho);
				}					
			//$this->gph_canvas->hexa('#FFFFFF');
			$this->gph_canvas->grava('', 60);
			
		}else{
			//show_404();
			echo '<h1>File Not Found</h1>';
		}
	}
}

/* End of file media.php */
/* Location: ./application/controllers/media.php */