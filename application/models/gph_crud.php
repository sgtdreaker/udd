<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe category
 *
 * @package     GoPubish
 * @subpackage  Models
 * @category    CRUD
 * @author      Barbosa, Renato Costa
 */
class Gph_crud extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }	

/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// buscas ///////////////////////////////////////////////////////////////////////////////////////////////////////*/

	// apenas realiza uma busca simples e retorna objeto ou 
	function buscar( $tabela=false, $buscar='sql', $parametros=false, $ordem=false, $like=false )
	{
		// Criando busca
		$this->db->select('*');
		$this->db->from($tabela);
		if(!empty($parametros))
		{
			$this->db->where($parametros);
		}
		// definindo a ordem do resultado
		if($ordem != false)
		{
			foreach($ordem as $ord)
			{
				$orde = explode(',', $ord);
				$this->db->order_by($orde[0], $orde[1]);
			}
		}
		// caso haja necessidade de buscar com like
		if(!empty($like))
		{
			$this->db->like($like);
		}
		// buscando os dados
		$sql = $this->db->get();
		
		// retornando o resultado
		if( $buscar != 'sql' ){
			foreach ($sql->result_array() as $row){ return $row[$buscar]; }
		}else{
			return $sql;
		}
	}
}
?>