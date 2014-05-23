$(function()
{
	
	/*
	 * masdcaras para telefone e celular
	 */
	if($("#ipt_fone").length ){ $("#ipt_fone").mask("9999-9999"); }
	if($("#ipt_celular").length ){ $("#ipt_celular").mask("99999-9999"); }
	
	/*
	 * validacao dos e-mails, caso exista algum e-mail ja cadastrado
	 */
	$('#ipt_email').blur(function(){
		$.post("<?=site_url(URL_PREFIX.'usuarios/valida_email')?>", $("#novo_usuario").serialize(), function(data) {
			if(data)
			{
				$('#alert_email').show();
				$("#btn_enviar").attr("disabled", "disabled");
			}else{
				$('#alert_email').hide();
				$("#btn_enviar").removeAttr("disabled");
			}
		});
	});
	
	
	/*
	 * validacao da senha e confirmacao - caso a senah nao bata com a confirmacao
	 */
	$('#ipt_confirmasenha').blur(function()
	{
     	var senha = $('#ipt_senha').val();
		var contrasenha = $('#ipt_confirmasenha').val();
		
		if(senha || contrasenha)
		{
			if(senha != contrasenha)
			{
				$('#alert_senha').show('slow');
				$('#ipt_senha').focus();
			}else{
				if($('#alert_senha').is(':visible'))
				{
					$('#alert_senha').hide('hide');
				}
			}
		}
		//$(this).css({"border-color" : "#F00", "padding": "2px"});
    });


	/*
	 * enviando formulario de cadastro
	 */
	$('#btn_enviar').click(function(){
		var ipt_nome       = $('#ipt_nome').val();
		var ipt_email      = $('#ipt_email').val();
		var ipt_senha      = $('#ipt_senha').val();
		var ipt_confirmasenha = $('#ipt_confirmasenha').val();
		var ipt_endereco   = $('#ipt_endereco').val();
		var ipt_bairro     = $('#ipt_bairro').val();
		var ipt_cidade     = $('#ipt_cidade').val();
		var ipt_estado     = $('#ipt_estado').val();
		var ipt_dddfone    = $('#ipt_dddfone').val();
		var ipt_fone       = $('#ipt_fone').val();
		var ipt_dddcelular = $('#ipt_dddcelular').val();
		var ipt_celular    = $('#ipt_celular').val();
		var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		
		
		if(!ipt_nome)
		{
			alert('Informe o nome');
			$('#ipt_nome').focus();
		}else if(!filtro.test(ipt_email)){
			alert('Informe um e-mail válido');
			$('#ipt_email').focus();
		}else if(!ipt_senha){
			alert('Informe a senha');
			$('#ipt_senha').focus();
		}else if(!ipt_confirmasenha){
			alert('Informe a confirmação da senha');
			$('#ipt_confirmasenha').focus();
		}else if(!ipt_endereco){
			alert('Informe o endereço');
			$('#ipt_endereco').focus();
		}else if(!ipt_bairro){
			alert('Informe o bairro');
			$('#ipt_bairro').focus();
		}else if(!ipt_cidade){
			alert('Informe a cidade');
			$('#ipt_cidade').focus();
		}else if(!ipt_dddfone){
			alert('Informe o DDD');
			$('#ipt_dddfone').focus();
		}else if(!ipt_fone){
			alert('Informe o telefone');
			$('#ipt_fone').focus();
		}else{
			$('#formulario_enviar').hide(function(){
				$('#msg_alerta').show(function(){
					$('#novo_usuario').submit();
				});
			});
		}
	});
});

function janela(n_cod, c_nome)
{
	$('#n_cod_user').val(n_cod);
	$('#myModalLabel b').html(c_nome);
	$.post("<?=site_url(URL_PREFIX.'usuarios/permissoes')?>", $("#janela").serialize(), function(data){
		$('.permissoesuser').html(data);
	});
	$('#myModal').modal('show');
}


function perm(n_cod_user, local, sessao, acao)
{
	$('#set_n_cod_user').val(n_cod_user);
	$('#set_local').val(local);
	$('#set_sessao').val(sessao);
	$('#set_acao').val(acao);
	/*$.post("<?=site_url(URL_PREFIX.'usuarios/seta_permissoes')?>", $("#set_emp").serialize(), function(data){
		var retorno = '#sbm_'+sessao+'_'+acao+'_'+n_cod_user;
		$(retorno).empty();
		$(retorno).append(data);
		
	});*/
}
