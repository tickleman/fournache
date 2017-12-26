<?php
namespace ITRocks\Task\Year_Of_Weeks\Demo\Plank;

use ITRocks\Framework\Mapper\Component;
use ITRocks\Framework\Tools\Date_Time;
use ITRocks\Task\Year_Of_Weeks\Demo;
use ITRocks\Task\Year_Of_Weeks\Demo\Plank;

/**
 * A task, linked to a plank
 *
 * @link Demo\Task
 * @unique plank, task, week
 */
class Task extends Demo\Task
{
	use Component;

	//---------------------------------------------------------------------------------------- $plank
	/**
	 * @composite
	 * @link Object
	 * @var Plank
	 */
	public $plank;

	//----------------------------------------------------------------------------------------- $task
	/**
	 * @composite
	 * @link Object
	 * @var Task
	 */
	public $task;

	//----------------------------------------------------------------------------------------- $week
	/**
	 * @link DateTime
	 * @var Date_Time
	 */
	public $week;

	//----------------------------------------------------------------------------------- __construct
	/** @noinspection PhpMissingParentConstructorInspection */
	/**
	 * @param $task Task
	 * @param $week Date_Time
	 */
	public function __construct(Task $task = null, Date_Time $week = null)
	{
		if (isset($task)) {
			$this->task = $task;
		}
		if (isset($week)) {
			$this->week = $week;
		}
	}

}
