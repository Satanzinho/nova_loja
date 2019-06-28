<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/loja/");
	$config['dbname'] = 'nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "http://localhost/nova_loja/");
	$config['dbname'] = 'nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}

$config['default_lang'] = 'en';
$config['cep_origin'] = '28941394';

$config['pagseguro_seller'] = 'lassancejorgeluiz@gmail.com';

// Informações do MercadoPago
$config['mp_appid'] = '1105275921569321';
$config['mp_key'] = 'IMfKlf5v4kl4TJDc6kf4YELGqXQhy3gi';

// Informações do Paypal

$config['paypal_clientid'] = 'AZSlGjj4Z5V9NR9siEWuKnnuc6Ei5s-l_WPVjudM1NcAJrimHIToP9MkaD13tG5FLkDyqvAOg011vzG_';
$config['paypal_secret'] = 'EMhO7T8xqd9gzBG53IWxewAzefudhGzPysMJJAo4rRsKcwR7y0WqJHL1x_beqGFc-hUjMlEJ84fYpHHr';

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("NovaLoja")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("NovaLoja")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('lassancejorgeluiz@gmail.com', '6FCD8F3F124E4F6E925B78D67A05152B');
\PagSeguro\Configuration\Configure::setCharset('UTF8-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');