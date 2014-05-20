$(function() {
	$.validateEmail = function (email)
	{
		er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
		if(er.exec(email))
		{
			return true;
		}else{
			return false;
		}
	};

	
	$('#btn_caduser_enviar').click(function(){
		var ipt_avatar = $('#ipt_avatar').val();
		var ipt_nome   = $('#ipt_nome').val();
		var ipt_email  = $('#ipt_email').val();
		var ipt_senha  = $('#ipt_senha').val();
		var ipt_csenha = $('#ipt_csenha').val();
		var ipt_tipo   = $('#ipt_tipo').val();
		var ipt_status = $('#ipt_status').val();
		
		if(!ipt_nome)
		{
			alert('Informe o nome do usuário');
			$('#ipt_nome').focus();
		}else if ($.validateEmail(ipt_email)){
			alert('Informe um e-mail válido.');
			$('#ipt_email').focus();
		}
	});
});