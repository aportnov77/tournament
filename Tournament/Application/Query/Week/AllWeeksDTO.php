<?php

namespace Tournament\Application\Query\Week;

class AllWeeksDTO
{

    public function __construct(private $tournamentUuid, private int $weekNumber, private array $games)
    {
    }

    /**
     * @return mixed
     */
    public function getTournamentUuid()
    {
        return $this->tournamentUuid;
    }

    /**
     * @return int
     */
    public function getWeekNumber(): int
    {
        return $this->weekNumber;
    }

    /**
     * @return GameDTO[]
     */
    public function getGames(): array
    {
        return $this->games;
    }
}
