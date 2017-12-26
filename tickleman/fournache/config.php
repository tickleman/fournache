<?php
namespace Tickleman\Fournache;

use ITRocks\Framework\Configuration;

global $loc;
require __DIR__ . '/../../loc.php';
require __DIR__ . '/../../itrocks/framework/config.php';

$config['Tickleman/Fournache'] = [
	Configuration::APP         => Application::class,
	Configuration::ENVIRONMENT => $loc[Configuration::ENVIRONMENT],
	Configuration::EXTENDS_APP => 'ITRocks/Framework',
];
