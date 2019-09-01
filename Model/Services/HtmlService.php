<?php declare(strict_types=1);

namespace Model\Services;

class HtmlService implements IService
{
	private $usedNames;

	private $dogImages;

	public function __construct()
	{
		$this->usedNames = [];
		$this->dogImages = array_diff(scandir('images/dogs'), ['..', '.']);
	}

	public function generateWalkPicture(): string
	{
		$walkImages = array_diff(scandir('images/walks'), ['..', '.']);

		return '<img src="images/walks/' . $walkImages[2] . '" alt="' . $walkImages[2] . '"><br>';
	}

	public function generateDogPicture(): string
	{
		$name = $this->getPicturesName();

		return '<img src="images/dogs/' . $name . '" alt="' . $name . '"><br>';
	}

	private function getPicturesName(): string
	{
		if (count($this->dogImages) === count($this->usedNames)) {
			$this->clearUsedNames();
		}

		$randomImage = $this->dogImages[array_rand($this->dogImages)];
		if (!in_array($randomImage, $this->usedNames, TRUE)) {
			$this->usedNames[] = $randomImage;

			return $randomImage;

		}

		return $this->getPicturesName();

	}

	public function createLink(string $href, string $linkText): string
	{
		return "<a href='/" . $href . "'>$linkText</a><br>";
	}

	public function createHeader1(string $text): string
	{
		return "<h1>$text</h1><br>";
	}

	public function createHeader2($text, $name): string
	{
		return '<h2>' . $text . $name . '</h2>';
	}

	public function clearUsedNames(): void
	{
		$this->usedNames = [];
	}
}