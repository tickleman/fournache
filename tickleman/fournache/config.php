<?php
namespace Tickleman\Fournache;

use ITRocks\Framework;
use ITRocks\Framework\Configuration;
use ITRocks\Framework\Plugin\Priority;
use ITRocks\Planner;
use Tickleman\Fournache;

global $loc;
require __DIR__ . '/../../loc.php';
require __DIR__ . '/../../itrocks/framework/config.php';

$config['Tickleman/Fournache'] = [
	Configuration::APP         => Application::class,
	Configuration::ENVIRONMENT => $loc[Configuration::ENVIRONMENT],
	Configuration::EXTENDS_APP => 'ITRocks/Framework',

	Priority::CORE => [
		Framework\Builder::class => [
			Planner\Year_Of_Weeks::class => [Fournache\Year_Of_Weeks\Demo::class]
		]
	]
];
