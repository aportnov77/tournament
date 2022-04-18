<?php

namespace Tournament\Application\Query\Teams;

class TeamsListQuery
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
