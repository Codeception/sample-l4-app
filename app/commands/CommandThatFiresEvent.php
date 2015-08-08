<?php

use Illuminate\Console\Command;

class CommandThatFiresEvent extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'test:fire-event';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Fires an event';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		Event::fire('artisan-event', array(
			'data' => array('message' => 'event-fired')
		));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
