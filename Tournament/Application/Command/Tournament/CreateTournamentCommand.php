<?php

namespace Tournament\Application\Command\Tournament;

class CreateTournamentCommand
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
