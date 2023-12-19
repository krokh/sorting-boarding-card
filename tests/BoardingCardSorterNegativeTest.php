<?php

use Krokh\SortingBoardingCards\BoardingCardSorter;
use PHPUnit\Framework\TestCase;

class BoardingCardSorterNegativeTest extends TestCase
{
    /**
     * Test sorting when input is not an array.
     */
    public function testSortBoardingCardsInvalidInput()
    {
        // Invalid input (not an array)
        $boardingCards = 'invalid_input';

        // Expecting an exception
        $this->expectException(TypeError::class);

        // Sorting should throw an exception
        BoardingCardSorter::sortBoardingCards($boardingCards);
    }
}
