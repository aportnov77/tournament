<?php

namespace Tournament\Application\Command\Tournament;

class GenerateFixturesCommand
{

    public function __construct(private $tournamentUuid)
    {
    }

    /**
     * @return mixed
     */
    public function getTournamentUuid()
    {
        return $this->tournamentUuid;
    }
}
