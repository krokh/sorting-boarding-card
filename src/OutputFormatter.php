<?php

namespace Krokh\SortingBoardingCards;

class OutputFormatter
{
    public static function print(array $sortedCards): string
    {
        $journey = [];
        foreach ($sortedCards as $index => $card) {
            $journey[] = [
                'step' => ($index + 1),
                'description' => 'Take ' . $card->transportation . ' from ' . $card->departure . ' to '
                    . $card->arrival . '.'
                    . (isset($card->seat) ? ' Sit in seat ' . $card->seat . '.' : ' No seat assignment.')
                    . (isset($card->baggage) ? ' ' . $card->baggage . '.' : ''),
            ];
        }
        $journey[] = ['step' => count($journey) + 1, 'description' => 'You have arrived at your final destination.'];

        return json_encode($journey, JSON_PRETTY_PRINT) . PHP_EOL;
    }
}