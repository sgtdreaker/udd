<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=RMT_NOME?> - Login</title>
	<link href="<?=base_url('media/css/geral/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('media/css/geral/normalize.css')?>" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700italic|Open+Sans:600italic,400,700' rel='stylesheet' type='text/css'>
    <link href="<?=base_url('media/css/admin/login.css')?>" rel="stylesheet" type="text/css" />
    <script language="javascript" src="<?=base_url('media/js/geral/jquery-1.9.1.min.js')?>"></script>
    <script language="javascript" src="<?=base_url('media/js/geral/bootstrap.js')?>"></script>
    <script language="javascript" src="<?=base_url('media/js/admin/login.js')?>"></script>
</head>

<body>
<header class="header"></header>
<section class="section">
	<ul>
    	<li class="section_esquerda">
        	<h3>Atenção: você está acessando uma sessão restrita do site.</h3>
           <p>Esta é uma sessão restrita e monitorada do site. Seu ip atual é <b><?=$this->input->ip_address()?></b><br /><br /><?=$this->input->user_agent()?></p>
        	<!--<nav>
           		<a href="" class="btn btn-default">...</a>
            	<a href="" class="btn btn-default">...</a>
            	<a href="" class="btn btn-default">...</a>
            	<a href="" class="btn btn-default">...</a>
           </nav>-->
        </li>
       <li class="section_direita">
        <aside>
            <div class="section_direita--labelimpo">
            	<span>Informações do usuário e senha.</span>
            </div>
            <?=form_open(URL_PREFIX.'login/valida', array('name'=>'frm_login', 'id'=>'frm_login'))?>
            <div class="section_direita--formulario">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><div style="width:70px">Usuário</div></span>
                    <input name="usr_nome" id="usr_nome" type="text" class="form-control" placeholder="nome de usuário">
                </div>
                <div class="limpa"></div>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><div style="width:70px">Senha</div></span>
                    <input name="usr_senha" id="usr_senha" type="password" class="form-control" placeholder="senha">
                </div>
                <div class="section_direita--btnenviar">
                    <button class="btn btn-primary btn-lg" id="btn_login" type="button">entrar</button>
                </div>
                <div class="retorno alert alert-warning">
                    <strong>Atenção</strong><br />
                    Usuário ou senha inválidos.
                </div>
            </div> 
            <?=form_close()?>
        </aside>
       </li>
    </ul>
</section>
<footer></footer>
</body>
</html>