<?php

namespace Krokh\SortingBoardingCards;

class BoardingCard
{
    public string $departure;
    public string $arrival;
    public string $transportation;
    public string|null $seat;
    public string|null $baggage;

    public function __construct(
        string$departure,
        string$arrival,
        string $transportation,
        string $seat = null,
        string $baggage = null
    ) {
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->transportation = $transportation;
        $this->seat = $seat;
        $this->baggage = $baggage;
    }
}

