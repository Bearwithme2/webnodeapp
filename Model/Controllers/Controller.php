<?php declare(strict_types=1);

namespace Model\Controllers;


use Model\Services\DogService;
use Model\Services\HtmlService;

class Controller implements IController
{
	private $dogService;

	private $htmlService;

	public function __construct()
	{
		$this->dogService = new DogService;
		$this->htmlService = new HtmlService;
	}

	public function yield(): string
	{
		$header = $this->htmlService->createHeader1('Hello and welcome to dog walking site!');

		return $header . $this->dogService->createWalkProposals();
	}
}