<?php

namespace Tournament\Application\Query\Week;

class GameDTO
{

    public function __construct(private TeamDTO $teamA, private TeamDTO $teamB)
    {
    }

    /**
     * @return TeamDTO
     */
    public function getTeamA(): TeamDTO
    {
        return $this->teamA;
    }

    /**
     * @return TeamDTO
     */
    public function getTeamB(): TeamDTO
    {
        return $this->teamB;
    }
}
