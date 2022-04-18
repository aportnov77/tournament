<?php

namespace Tournament\Domain\Tournament\Event;

use Tournament\Domain\Team\Team;

class TeamAddedEvent extends BaseEvent
{

    public function __construct(private Team $team)
    {
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

}
