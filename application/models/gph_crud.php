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
		
		/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// busca os dados com a paginação ////////////////////////////////////////////////////////////////////////////////
			$num		-> quantos resultados mostrar por página
			$offset		-> offset atual
			$tabela		-> qual tabela irei usar na busca
			$parametros	-> qual parametros irei usar na busca: ex array('site'=>'atacvb')
			$ordem		-> classificação dos resultados: ex order by id array('id , asc')
			$exata		-> caso necessite usar um like na busca
		/////////////////////*/
			function getDados($num, $offset, $tabela, $parametros=false, $ordem=false, $exata=false, $conta=true )
			{
				$this->db->select('*');
				
				//-> array para busca
				if(is_array($parametros))
				{
					$this->db->where($parametros);
				}
				
				//-> caso necessite de usar o like
				if(is_array($exata))
				{
					$this->db->like($exata);
				}
				//-> ordena a usca
				if($ordem != false)
				{
					foreach($ordem as $ord)
					{
						$orde = explode(',', $ord);
						$this->db->order_by($orde[0], $orde[1]);
					}
				}
				
				if($conta == true)
				{
					$sql = $this->db->get($tabela, $num, $offset);
				}else{
					$sql = $this->db->get($tabela);
				}
				return $sql;
			}
		
	/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// processos (cadastro, alterar e excluir) /////////////////////////////////////////////////////////////////////*/
	
		//-> cadastra dados no banco
		function adiciona( $tabela, $parametros, $ordem = false )
		{
			if(!empty($tabela) && !empty($parametros))
			{
				// adicionando dados na tabela
					$this->db->insert($tabela, $parametros);
				// buscando resultados adicionados
					
					$this->db->select('*');
					if($ordem != false)
					{
						foreach($ordem as $ord)
						{
							$orde = explode(',', $ord);
							$this->db->order_by($orde[0], $orde[1]);
						}
					}
					
					$sql = $this->db->get($tabela, 1);
				// retornando valores adicionados e ordenanos
					return $sql->result_array();
			}
			  else
			{
				return false;
			}
		}
		//-> exclusao de informacoes no banco
		function excluir( $tabela=false, $parametros=false )
		{
			// validando entrada de dados
				if($tabela == true && is_array($parametros))
				{
					if($this->db->delete($tabela, $parametros))
					{
						return true;
					}
					   else
					{
						return false;
					}
				}
		}
		//-> atualiza dados no banco
		function atualizar( $tabela=false, $condicao=false, $parametros=false )
		{
			// validando entrada de dados
				if($tabela == true && is_array($condicao) && is_array($parametros))
				{
					$this->db->where($condicao);
					if($this->db->update($tabela, $parametros))
					{
						return true;
					}
					   else
					{
						return false;
					}
				}
		}
}
?>