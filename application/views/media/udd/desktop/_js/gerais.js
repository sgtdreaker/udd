$(function() {
	
	$('#btn_login').click(function(){
		
		var usr_nome = $('#usr_nome').val();
		var usr_senha = $('#usr_senha').val();
		
		if(!usr_nome)
		{
			alert('Informe o seu nome');
			$('#usr_nome').focus();
		}else if(!usr_senha)
		{
			alert('Informe sua senha');
			$('#usr_senha').focus();
		}else{
			alert('OK');
		}
	});

});