<?php

namespace Frame;

class Controller
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	protected function model($model)
	{
		require_once "app/Models/" . $model . ".php";
		return new $model($this->db);
	}

	protected function view($view, $data)
	{
		require_once "app/Views/" . $view . ".php";

		// if we use some view and performance_meter is enabled in config then show metrics
		if (CONFIG['performance_meter']) {
			echo "\n<!-- This is a Performance Meter -->\n";
			echo "<div style='position: fixed;right: 0;bottom: 30px;padding: 2px 15px;background-color: rgba(252,57,0,0.9);font-family: Verdana;color: white;text-align: right;border-radius: 5px 0 0 5px;'>\n";
			echo round((microtime(true) - START) * 1000000) . " <b>μs</b><br>\n";
			echo round(memory_get_peak_usage() / 1024) . " <b>kB</b></div>\n";
			echo "<!-- End of Performance Meter -->\n";
		}
	}
}
