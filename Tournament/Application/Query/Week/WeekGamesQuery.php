<?php

namespace Tournament\Application\Query\Week;

class WeekGamesQuery
{

    public function __construct(private string $tournamentUuid, private int $weekNumber)
    {
    }

    /**
     * @return string
     */
    public function getTournamentUuid(): string
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
}
