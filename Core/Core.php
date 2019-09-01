<?php declare(strict_types=1);

namespace Core;

use Model\Controllers\Controller;
use Model\Controllers\IController;

class Core
{

	public function run(): void
	{
		$config = $this->initiateAppConfig();

		if (empty($config)) {
			throw new \RuntimeException('Missing Config', 500);
		}

		$controller = $this->mapControllers($config);
		echo $controller->yield();

	}

	protected function mapControllers(array $config): IController
	{
		$request = $_SERVER['REQUEST_URI'];
		foreach ($config['controllers'] as $item) {
			$controller = new Controller();
			if ($request === $item['route']) {
				/** @var IController $controller */
				$controller = new $item['className'];
			}
		}

		return $controller;
	}

	/**
	 * @return mixed
	 */
	protected function initiateAppConfig(): array
	{
		$config = json_decode(file_get_contents('config/config.json'), TRUE);

		return $config ?: [];
	}
}