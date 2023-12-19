<?php

use Krokh\SortingBoardingCards\BoardingCard;
use Krokh\SortingBoardingCards\BoardingCardSorter;
use Krokh\SortingBoardingCards\OutputFormatter;
use PHPUnit\Framework\TestCase;

class BoardingCardSorterTest extends TestCase
{
    public function testSortBoardingCards()
    {
        // Input data
        $boardingCards = [
            new BoardingCard('Madrid', 'Barcelona', 'Train 78A', '45B'),
            new BoardingCard('Barcelona', 'Gerona Airport', 'Airport Bus'),
            new BoardingCard('Gerona Airport', 'Stockholm', 'Flight SK455', '3A', 'Drop at ticket counter 344'),
            new BoardingCard('Stockholm', 'New York JFK', 'Flight SK22', '7B', 'Automatically transferred from your last leg'),
        ];

        // Expected output
        $expectedResult = [
            ["step" => 1, "description" => "Take Train 78A from Madrid to Barcelona. Sit in seat 45B."],
            ["step" => 2, "description" => "Take Airport Bus from Barcelona to Gerona Airport. No seat assignment."],
            ["step" => 3, "description" => "Take Flight SK455 from Gerona Airport to Stockholm. Sit in seat 3A. Drop at ticket counter 344."],
            ["step" => 4, "description" => "Take Flight SK22 from Stockholm to New York JFK. Sit in seat 7B. Automatically transferred from your last leg."],
            ["step" => 5, "description" => "You have arrived at your final destination."],
        ];

        // Actual output
        $actualResult = BoardingCardSorter::sortBoardingCards($boardingCards);
        $formattedResult = json_decode(OutputFormatter::print($actualResult), true);

        // Compare actual and expected results
        $this->assertEquals($expectedResult, $this->formatForComparison($formattedResult));
    }

    /**
     * Helper function to format the actual result for comparison as some properties are dynamically generated.
     */
    private function formatForComparison($result): array
    {
        $formattedResult = [];
        foreach ($result as $card) {
            $formattedResult[] = ["step" => $card['step'], "description" => $card['description']];
        }
        return $formattedResult;
    }
}
