<h1>Alterar Usuários</h1>
<p>Escolha o usuário na listagem abaixo para realizar a alteração em seu cadastro.</p>
<div class="pontos"></div>
<div class="usrlistagem">
    <?
    	foreach($usuarios->result() as $usr):
	?>
	<div class="usrlistagem_titulo">
    	<span class="alert alert-info">Dados do usuário</span>
        <ul>
        	<li>
            	<a href="javascript:janela('<?=$usr->n_cod?>', '<?=$usr->c_nome?>')" 
                   title="Definir permissões do usuário">
                   	<span class="glyphicon glyphicon-eye-open"></span>
            	</a>
            </li>
            <li>
            	<a href="javascript:janela(<?=$usr->n_cod?>)" 
                   title="Cadastrar avatar do usuário">
                   	<span class="glyphicon glyphicon-camera"></span>
            	</a>
            </li>
        </ul>
    </div>
    <div class="alert alert-warning" style="opacity:0.7">
    	<div class="usrlistagem_imagem">
        <?
        	// buscando imagem do usuario
			$imagem = $this->gph_crud->buscar(DB_PREFIX.'arquivos', 'c_arquivo', array('c_conteudo' => 'usuarios',
																					   'c_tipo'     => 'simples',
																					   'n_cod_ref'  => $usr->n_cod));
			if(!empty($imagem)):
				echo '<img src="'.base_url('media/imagens/galerias/galeria/10/1401/home.jpg').'">';
			endif;
		?>
        </div>
        <b>Nome:</b> <?=$usr->c_nome?><br />
        <b>Status:</b> 
			<?
            	if($usr->c_status == 'ativo')
				{
					echo '<span class="label label-primary" style="text-transform:uppercase">'.$usr->c_status.'</span>';
				}else{
					echo '<span class="label label-danger" style="text-transform:uppercase">'.$usr->c_status.'</span>';
				}
            ?>
        <br />
        <b>Registrado em:</b> <?=data($usr->c_registro,'P')?>
        <div class="pontos"></div>
        <div class="usrlistagem_btnenviar">
        	<a href="<?=site_url(URL_PREFIX.'usuarios/alterar_usuario/'.$usr->n_cod)?>" class="btn btn-default">Alterar este cadastro</a>
        </div>
    </div>
    <?
    	endforeach;
	?>
    <div class="pontos"></div>
    <?=$links?>
</div>


<?
	echo form_open('', array('name'=>'janela', 'id'=>'janela'));
	echo '<input type="hidden" name="n_cod_user" id="n_cod_user" value="" />';
	echo form_close();
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Permissões de <b></b></h4>
      </div>
      <div class="modal-body">
      	<div class="permissoesuser"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
































