<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=RMT_NOME?> - Login</title>
	<? 
		$this->inits->init_css(array('bootstrap.min', 'normalize'), 'geral');
        $this->inits->init_js(array('jquery-1.9.1.min', 'bootstrap', 'jquery.easing.1.3'), 'geral');
	?>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700italic|Open+Sans:600italic,400,700' rel='stylesheet' type='text/css'>
    </head>

<body>
<div class="gphtopo">
	<div class="gphtopo_infos">
	    <div class="gphtopo_infos--logo">&nbsp;</div>
        <div class="gphtopo_infos--menu">
	        <?=$this->cfg->menu()?>
        </div>
    </div>
</div>
<div class="userinfos">
	<div class="userinfos_dados">
    	<div class="userinfos_dados--avatar">
			<?
                if($this->auth->c_tipo == 'admin')
				{
					echo '<img src="'.base_url('sites/admin/_images/avatar.jpg').'" title="Avatar de '.$this->auth->c_usuario.'">';
				}
            ?>
        </div>
        <div class="userinfos_dados--dados">
            Olá <b><?=$this->auth->c_usuario?></b>. Você está logado no <b>GoPublish</b>.<br />
            Último acesso em <b><?=data($this->auth->acesso_data)?></b> às <b><?=hora($this->auth->acesso_hora)?></b>. 
            ( <a href="<?=site_url(URL_PREFIX.'inicio')?>">página principal</a> )
        </div>
    </div>
    <div class="limpa"></div>
</div>