<?php declare(strict_types=1);

namespace Model\Controllers;


use Model\Services\HtmlService;

class WalkController implements IController
{
	private $htmlService;

	public function __construct()
	{
		$this->htmlService = new HtmlService;
	}

	public function yield(): string
	{
		return $this->htmlService->createHeader1('Lets enjoy this great walk!') .
			$this->htmlService->generateWalkPicture() .
			$this->htmlService->createLink('', 'Back to the main page');
	}
}