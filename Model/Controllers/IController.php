<?php declare(strict_types=1);

namespace Model\Controllers;

interface IController
{
	public function yield(): string;
}