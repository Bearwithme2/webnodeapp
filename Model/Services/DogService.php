<?php declare(strict_types=1);

namespace Model\Services;

class DogService implements IService
{
	private $htmlService;

	public function __construct()
	{
		$this->htmlService = new HtmlService;
	}

	public function createWalkProposals(): string
	{
		$response = '';
		for ($i = 0; $i < 3; $i++) {
			$response .= $this->getDogsGreeting();
			$response .= $this->htmlService->generateDogPicture();
			$response .= $this->htmlService->createLink('walk', 'Take me for a walk');
		}

		return $response;
	}

	private function getDogsGreeting(): string
	{
		$names = json_decode(file_get_contents('config/names.json'), TRUE);
		$name = $names['names'][array_rand($names['names'])];

		return $this->htmlService->createHeader2('Hi my name is ', $name);
	}

}