<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=RMT_NOME?> - Login</title>
	<? 
		$this->inits->init_css(array('bootstrap.min', 'normalize'), 'geral');
        $this->inits->init_js(array('jquery-1.9.1.min', 'bootstrap'), 'geral');
	?>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700italic|Open+Sans:600italic,400,700' rel='stylesheet' type='text/css'>
    </head>

<body>
<header class="header">
	<nav class="header__topo">
    	<h1>
        	<a href="<?=site_url(URL_PREFIX.'inicio')?>"><?=RMT_NOME?></a>
        </h1>
        <ul>
            <li class="header__topo--servicos"><?=$this->cfg->servicos()?></li>
            <li><span style="width:1px; height:50px; display:block; border-left:1px dotted #000000; margin:0 5px 0 15px;"></span></li>
            <li><?=$this->cfg->menu('principal')?></li>
        </ul>
        <div class="limpa"></div>
    </nav>
    <?=$this->cfg->menu()?>
    <div class="limpa"></div>
</header>
<section class="section">