<?php
namespace Tickleman\Fournache\Year_Of_Weeks;

use ITRocks\Framework\Tools\Date_Time;
use ITRocks\Planner\Task;
use ITRocks\Planner\Task\Duration;
use ITRocks\Planner\Task\Type;
use ITRocks\Planner\Year_Of_Weeks;
use Tickleman\Fournache\Plank;
use Tickleman\Fournache\Plant;

/**
 * @extends Year_Of_Weeks
 */
trait Demo
{

	//----------------------------------------------------------------------------------- __construct
	public function __construct()
	{
		// plants
		$carrots   = new Plant('carrots');
		$salads    = new Plant('salads');
		$zucchinis = new Plant('zucchinis');

		// task types
		$grow    = new Type('Grow');
		$harvest = new Type('Harvest');
		$plant   = new Type('Plant');
		$sow     = new Type('Sow');

		// salads
		$sow_salads   = new Task($salads, $sow, 0);
		$plant_salads = new Task($salads, $plant, Duration::WEEK, $sow_salads, Duration::weeks(5));
		$grow_salads  = new Task($salads, $grow, Duration::weeks(6), $plant_salads);
		new Task($salads, $harvest, Duration::weeks(3), $grow_salads);
		$salads_task = new Plank\Task($sow_salads, new Date_Time('2018-01-29'));

		// zucchinis
		$sow_zucchinis   = new Task($zucchinis, $sow, 0);
		$plant_zucchinis = new Task($zucchinis, $plant, Duration::WEEK, $sow_zucchinis, Duration::weeks(5));
		$grow_zucchinis  = new Task($zucchinis, $grow, Duration::weeks(7), $plant_zucchinis);
		new Task($zucchinis, $harvest, Duration::weeks(3), $grow_zucchinis);
		$zucchinis_task = new Plank\Task($sow_zucchinis, new Date_Time('2018-01-15'));

		// carrots
		$sow_carrots   = new Task($carrots, $sow, 0);
		$plant_carrots = new Task($carrots, $plant, Duration::WEEK, $sow_carrots, Duration::weeks(5));
		$grow_carrots  = new Task($carrots, $grow, Duration::weeks(7), $plant_carrots);
		new Task($carrots, $harvest, Duration::weeks(3), $grow_carrots);
		$carrots_task = new Plank\Task($sow_carrots, new Date_Time('2018-01-15'));

		/** @var $this Year_Of_Weeks|self */
		$this->resources = [
			new Plank('A1', [$salads_task, $zucchinis_task]),
			new Plank('A2', [$carrots_task])
		];

		for ($week = 1; $week <= 52; $week ++) {
			/** @var $this Year_Of_Weeks|self */
			$this->weeks[$week] = $week;
		}
	}

}
