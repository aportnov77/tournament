<?php

namespace Tournament\Application\Query\Week;

class AllWeeksQuery
{

    public function __construct(private string $tournamentUuid)
    {
    }

    /**
     * @return string
     */
    public function getTournamentUuid(): string
    {
        return $this->tournamentUuid;
    }
}
