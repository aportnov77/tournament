<?php

namespace Tournament\Application\Query\Tournament;

class TournamentTableItemDTO
{

    public function __construct(
        private string $name,
        private int $played,
        private int $won,
        private int $loss,
        private int $drow,
        private int $gd
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getLoss(): int
    {
        return $this->loss;
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
    public function getGd(): int
    {
        return $this->gd;
    }
}
