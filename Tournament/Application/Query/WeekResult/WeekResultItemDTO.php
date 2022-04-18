<?php

namespace Tournament\Application\Query\WeekResult;

class WeekResultItemDTO
{

    public function __construct(
        private string $playerName,
        private int $played,
        private int $won,
        private int $drow,
        private int $loss,
        private int $gd
    ) {
    }

    /**
     * @return string
     */
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /**
     * @return int
     */
    public function getPlayed(): int
    {
        return $this->played;
    }

    /**
     * @return int
     */
    public function getWon(): int
    {
        return $this->won;
    }

    /**
     * @return int
     */
    public function getDrow(): int
    {
        return $this->drow;
    }

    /**
     * @return int
     */
    public function getLoss(): int
    {
        return $this->loss;
    }

    /**
     * @return int
     */
    public function getGd(): int
    {
        return $this->gd;
    }

}
