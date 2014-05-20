<div class="titulo">Usuários</div>
<section class="conteudos">
	<?=$this->cfg->submenu('geral', 'usuarios')?>
	<section class="conteudos__dados">
    	<div class="limpa" style="height:15px"></div>
        <h1>Cadastro de usuários</h1>
        <p>Para cadastrar um novo usuário no sistema, preencha o formulário abaixo.</p>
        <section class="conteudos__dados--formulario">
        	<?=form_open_multipart(URL_PREFIX.'usuarios/cadastrar_out', array('name'=>'frm_usuarios', 'id'=>'frm_usuarios'))?>
            <p>
            	<label for="ipt_avatar">Avatar</label>
                <input type="file" name="ipt_avatar" id="ipt_avatar" value="" />
                <div class="alert alert-danger" style="width:400px; margin:0 0 0 110px;">
                	Caso você não informe a imagem do avatar, o sistema irá assumir uma imagem padrão.
                </div>
            </p>
            <p>
            	<label for="ipt_nome">Nome</label>
                <input type="text" class="form-control" name="ipt_nome" id="ipt_nome" value="" placeholder="Nome do usuário" style="width:450px" />
            </p>
            <p>
            	<label for="ipt_email">E-mail</label>
                <input type="text" class="form-control" name="ipt_email" id="ipt_email" value="" placeholder="E-mail do usuario" style="width:450px" />
            </p>
            <p>
            	<label for="ipt_senha">Senha</label>
                <input type="password" class="form-control" name="ipt_senha" id="ipt_senha" value="" placeholder="Senha de acesso" style="width:250px" />
            </p>
            <p>
            	<label for="ipt_csenha">Confirmação</label>
                <input type="password" class="form-control" name="ipt_csenha" id="ipt_csenha" value="" placeholder="Confirme a senha" style="width:250px" />
            </p>
            <p>
            	<label for="ipt_tipo">Tipo</label>
                <select name="ipt_tipo" class="form-control" style="width:250px">
                	<option value="admin">Administrador</option>
                    <option value="user" selected="selected">Usuário</option>
                </select>

            </p>
            <p>
            	<label for="ipt_status">Status</label>
                <select name="ipt_status" class="form-control" style="width:150px">
                	<option value="ativo">Ativo</option>
                    <option value="inativo" selected="selected">Inativo</option>
                </select>
            </p>
            <p style="border-top:1px dotted #CCCCCC; padding:10px 0 0 0;">
            	<label for=""></label>
                <button type="button" id="btn_caduser_enviar" class="btn btn-primary">Enviar</button>
            </p>
            <?=form_close()?>
        </section>
        <div class="limpa" style="height:15px"></div>
    </section>
    <div style=" width:100%; clear:both; height:1px !important;"></div>
</section>