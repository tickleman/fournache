<?php
namespace Tickleman\Fournache;

use ITRocks\Framework\Traits\Has_Name;
use ITRocks\Planner\Resource;
use ITRocks\Planner\Task;

/**
 * A plank is a specific resource for year-of-weeks planning for vegetable farmers
 */
class Plank implements Resource
{
	use Has_Name;

	//---------------------------------------------------------------------------------------- $tasks
	/**
	 * @link Map
	 * @var Task[]
	 */
	public $tasks;

	//----------------------------------------------------------------------------------- __construct
	/**
	 * @param $name  string
	 * @param $tasks Task[]
	 */
	public function __construct($name = null, array $tasks = null)
	{
		if (isset($name)) {
			$this->name = $name;
		}
		if (isset($tasks)) {
			$this->tasks = $tasks;
		}
	}

}
