<?php
defined('BASEPATH') or exit('No direct script access allowed');

use VisualAppeal\AutoUpdate;

class Update_model extends CI_Model
{
	/**
	 * URL Update
	 *
	 * @var [URL_UPDATE]
	 */
	protected const URL_UPDATE = 'https://wow-cms.com';

	/**
	 * Update_model constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return [type]
	 */
	public function getCurrentVersion()
	{
		$version = '1.1.0';
		return $version;
	}

	/**
	 * @return [type]
	 */
	public function getApacheModules()
	{
		$modules = apache_get_modules();
		foreach ($modules as $module) {
			echo "$module ";
		}
	}

	/**
	 * @return [type]
	 */
	public function getPHPExtensions()
	{
		$extensions = get_loaded_extensions();
		foreach ($extensions as $extension) {
			echo "$extension ";
		}
	}

	/**
	 * @return [type]
	 */
	public function checkUpdates()
	{
		$update = new AutoUpdate(FCPATH . 'temp', FCPATH . '', 60);
		$update->setCurrentVersion($this->getCurrentVersion());
		$update->setUpdateUrl(self::URL_UPDATE);

		// The following two lines are optional
		$update->addLogHandler(new Monolog\Handler\StreamHandler(FCPATH . 'logs/update.log'));

		//Check for a new update
		if ($update->checkUpdate() === false)
			die('Could not check for updates! See log file for details.');

		// Check if new update is available
		if ($update->newVersionAvailable()) {
			echo 'New Version: ' . $update->getLatestVersion();
			// Simulate or install?
			$simulate = false;
			//Install new update
			$result = $update->update($simulate);
			if ($result === true) {
				return true;
			} else {
				return 'UpdErr';
			}
		} else {
			// No new update
			return 'UpdnotFound';
		}
	}
}
