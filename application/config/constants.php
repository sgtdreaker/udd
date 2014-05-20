<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Definicoes gerais para o GoPublish
|--------------------------------------------------------------------------
|
| Abaixo descrivo as constantes para o GoPublish
|
*/

define('N_COD',			'XpioJJjhQxkLa9pYBhScEqbOSzyIsl5iZ5sOF8N+Wecf+x2uNoKdsvM/EVZcYxXsay1w0Y5+V41aPhpRSCSqGw==');
define('C_EMAIL',		'1e119fa46c3625077f82f44bc46bb406');
define('C_USUARIO',		'WM8hBownYoKYFYwr6Rnu2LzEbRjQz54c/7TZFeoKPS9G7FkduoOYuh+JQtjL2rC1WjSHEEnqVLGe1qCyjaDxdg==');
define('C_NOME',		'ClOlF//Qf++7k7MlrhyOjxL89b2n64DeR2aDI5MAILswATecbMYJ6RujBM86KQbn47upH7fJMe0LDjMebKPzJQ==');
define('C_SENHA',		'f53e56ca0175d57a40a405b299d0b792');
define('C_TIPO',		'GuzYzfAvaqJ+Z8cFMRU8zEfKq4d8P69mre6cmHpukkuDipDHPilQU34xG/JBRPQXwQxc/E5IlG2u/CtZEHW7sQ==');
define('C_STATUS',		'tZwvEe2oewLzVjj/1UlS/3AyTbAf52FhYQWHZ3VCewqvYEpUt4pVRO7ExHkW4va9V6iCBFIoTggtiTPxP57oNA==');
define('C_REGISTRO',	'AuWslL2BXNrfggWe2Gn2tuLGE7K9VPTBQozuFBQEIdqXJWLy4b4i2FFEjPAQqwTs7oi5Y+VR2U1G6nLR4Aijrg==');
define('DB_PREFIX',		'gph_');
define('URL_PREFIX',	'remote/');
define('RMT_NOME',		'GoPublish');
define('BASE_CLIENT',	'udd');
define('BASE_ISSET',	'http://localhost/udd/');
define('DEBUG',			TRUE);

/* End of file constants.php */
/* Location: ./application/config/constants.php */