<?php
namespace Tickleman\Fournache\Plank;

use Exception;
use ITRocks\Framework\Mapper\Component;
use ITRocks\Framework\Reflection\Reflection_Class;
use ITRocks\Framework\Tools\Date_Time;
use ITRocks\Planner;
use ITRocks\Planner\Task\Duration;
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
	 * @throws Exception
	 */
	public function __construct(Planner\Task $task = null, Date_Time $week = null)
	{
		if (isset($task)) {
			$this->task = $task;
			foreach ((new Reflection_Class(get_class($task)))->accessProperties() as $property) {
				$property->setValue($this, $property->getValue($this->task));
			}
		}
		if (isset($week)) {
			$this->week = $week;
		}
	}

	//--------------------------------------------------------------------------------------- endWeek
	/**
	 * Returns the end week (week + duration)
	 */
	public function endWeek()
	{
		return $this->week->format('W') + $this->weeks();
	}

	//----------------------------------------------------------------------------------------- weeks
	/**
	 * Returns the duration in weeks
	 *
	 * @return integer
	 */
	public function weeks()
	{
		return Duration::toWeeks($this->duration);
	}

}
