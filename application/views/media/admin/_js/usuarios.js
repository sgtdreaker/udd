$(function()
{
	
	var masks = ['00000-0000', '0000-00009'],
		maskBehavior = function(val, e, field, options) {
		return val.length > 14 ? masks[0] : masks[1];
	};
	
	$('#ipt_fone').mask(maskBehavior, {onKeyPress: 
			function(val, e, field, options) {
			field.mask(maskBehavior(val, e, field, options), options);
		}
	});
	
	$('#ipt_celular').mask(maskBehavior, {onKeyPress: 
			function(val, e, field, options) {
			field.mask(maskBehavior(val, e, field, options), options);
		}
	});
	
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