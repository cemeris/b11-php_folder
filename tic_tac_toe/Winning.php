<?php
class Winning
{
    private $win_cases = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],

        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],

        [0, 4, 8],
        [2, 4, 6]
    ];
    public function determineWinner($symbol, $moves) {
        foreach ($this->win_cases as $case) {
            if (
                @$moves[$case[0]] === $symbol &&
                @$moves[$case[1]] === $symbol &&
                @$moves[$case[2]] === $symbol
            ) {
                return true;
            }
        }

        return false;
    }
}