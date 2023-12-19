<?php

use Krokh\SortingBoardingCards\BoardingCard;
use Krokh\SortingBoardingCards\BoardingCardSorter;
use Krokh\SortingBoardingCards\OutputFormatter;

require 'vendor/autoload.php';

// Decode JSON input
$inputData = json_decode(file_get_contents(__DIR__ . '/input.json'), true);
$boardingCards = [];

foreach ($inputData as $inputLine) {
    $boardingCards[] = new BoardingCard(...$inputLine);
}

$sortedCards = BoardingCardSorter::sortBoardingCards($boardingCards);

// Format the sorted journey
echo OutputFormatter::print($sortedCards);
