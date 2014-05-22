<h1>Cadastro de Usuários</h1>
<p>Para cadastrar um novo usuário, basta preencher corretamente o formulário abaixo.</p>
<div class="formulario">
	<?=form_open(URL_PREFIX.'usuarios/cadastrarout', array('name'=>'novo_usuario', 'id'=>'novo_usuario'))?>
	<p>
    	<label for="ipt_nome">Nome</label>
        <input name="ipt_nome" type="text" class="form-control" id="ipt_nome" placeholder="Informe o nome" style="width:450px" value="" maxlength="150" />
    </p>
    <p>
    	<label for="ipt_email">E-mail</label>
        <input name="ipt_email" type="text" class="form-control" id="ipt_email" placeholder="Informe o e-mail" style="width:450px" value="" maxlength="200" />
    </p>
    <div id="alert_email" style="display:none" class="alert alert-danger"><b>Atenção: </b>Esta conta de e-mail já está em uso.</div>
    <div class="formulario_destaque">
        <p>
            <label for="ipt_senha">Senha</label>
            <input name="ipt_senha" type="password" class="form-control" id="ipt_senha" style="width:250px" value="" maxlength="15" />
        </p>
        <p>
            <label for="ipt_confirmasenha">Confirmação</label>
            <input name="ipt_confirmasenha" type="password" class="form-control" id="ipt_confirmasenha" style="width:250px" value="" maxlength="15" />
        </p>
        <div id="alert_senha" style="display:none" class="alert alert-danger"><b>Atenção: </b>A senha e confirmação não conferem.</div>
    </div>
    <p>
        <label for="ipt_endereco">Endereço</label>
        <input name="ipt_endereco" type="text" class="form-control" id="ipt_endereco" placeholder="Informe o endereço" style="width:450px" value="" maxlength="200" />
    </p>
  <p>
    <label for="ipt_bairro">Bairro</label>
      <input name="ipt_bairro" type="text" class="form-control" id="ipt_bairro" placeholder="Informe o bairro" style="width:450px" value="" maxlength="80" />
    </p>
    <div class="formulario_doiscampos">	    
        <p>
            <label for="ipt_cidade">Cidade</label>
            <input name="ipt_cidade" type="text" class="form-control" id="ipt_cidade" placeholder="Informe a cidade" style="width:300px" value="" maxlength="90" />
            <select name="ipt_estado" class="form-control" style="width:80px">
              <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PR">PR</option>
                <option value="PB">PB</option>
                <option value="PA">PA</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SE">SE</option>
                <option value="SP" selected="selected">SP</option>
                <option value="TO">TO</option>
            </select>
        </p>
    </div>
    <div class="formulario_doiscampos">
        <p>
            <label for="ipt_dddfone">Telefone</label>
            <input name="ipt_dddfone" type="text" class="form-control" id="ipt_dddfone" placeholder="DDD" style="width:70px" value="" maxlength="2" />
            <input name="ipt_fone" type="text" class="form-control" id="ipt_fone" placeholder="Telefone" style="width:380px" value="" maxlength="10" />
        </p>
    </div>
    <div class="formulario_doiscampos">
        <p>
            <label for="ipt_dddcelular">Celular</label>
            <input name="ipt_dddcelular" type="text" class="form-control" id="ipt_dddcelular" placeholder="DDD" style="width:70px" value="" maxlength="2" />
            <input name="ipt_celular" type="text" class="form-control" id="ipt_celular" placeholder="Celular" style="width:380px" value="" maxlength="10" />
        </p>
    </div>
    <div id="formulario_enviar" class="formulario_enviar">
    	<input type="button" name="btn_enviar" class="btn btn-primary" id="btn_enviar" value="Enviar" />
    </div>
    <div id="msg_alerta" class="alert alert-danger"><b>Atenção: </b>enviando os dados.</div>
    <?=form_close()?>
</div>