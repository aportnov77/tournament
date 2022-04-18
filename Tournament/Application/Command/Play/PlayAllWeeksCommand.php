<?php

namespace Tournament\Application\Command\Play;

class PlayAllWeeksCommand
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
