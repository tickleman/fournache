<?php
namespace Tickleman\Fournache\Plank;

use ITRocks\Framework\Mapper\Component;
use ITRocks\Framework\Tools\Date_Time;
use ITRocks\Planner;
use Tickleman\Fournache\Plank;

/**
 * A task, linked to a plank
 *
 * @link Planner\Task
 * @unique plank, task, week
 */
class Task extends Planner\Task
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
	 * @var Planner\Task
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
	 * @param $task Planner\Task
	 * @param $week Date_Time
	 */
	public function __construct(Planner\Task $task = null, Date_Time $week = null)
	{
		if (isset($task)) {
			$this->task = $task;
		}
		if (isset($week)) {
			$this->week = $week;
		}
	}

}
