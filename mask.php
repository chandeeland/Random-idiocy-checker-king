<?php

include_once('config.inc.php');
include_once('example.inc.php');
include_once('api/flashfoto-php-sdk/flashfoto.php');

if(array_key_exists('i', $_REQUEST)) {
	$image_id = $_REQUEST['i'];
	$FlashFotoAPI = new FlashFoto($cfg['partner_username'], $cfg['partner_apikey'], $cfg['base_url']);
	echo $FlashFotoAPI->get($image_id, array('version'=>'MugshotMasked'));
}

