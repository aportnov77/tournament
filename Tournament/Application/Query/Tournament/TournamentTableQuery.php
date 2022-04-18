<?php

namespace Tournament\Application\Query\Tournament;

class TournamentTableQuery
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
