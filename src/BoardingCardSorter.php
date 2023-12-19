<?php

namespace Krokh\SortingBoardingCards;

class BoardingCardSorter
{
    public static function sortBoardingCards(array $boardingCards): array
    {
        $sortedBoardingCards = [];
        $arrivalMap = [];
        $departureMap = [];

        // Create a map of arrivals and departures
        foreach ($boardingCards as $card) {
            $arrivalMap[$card->arrival] = $card;
            $departureMap[$card->departure] = $card;
        }
        // Find the starting point
        $startPoint = null;
        foreach ($boardingCards as $card) {
            if (!isset($arrivalMap[$card->departure])) {
                $startPoint = $card;
                break;
            }
        }
        // Build the sorted list
        while ($startPoint) {
            $sortedBoardingCards[] = $startPoint;
            $startPoint = $departureMap[$startPoint->arrival] ?? null;
        }

        return $sortedBoardingCards;
    }
}
