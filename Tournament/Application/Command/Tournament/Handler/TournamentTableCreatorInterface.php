<?php

namespace Tournament\Application\Command\Tournament\Handler;

use Tournament\Domain\Team\Team;

interface TournamentTableCreatorInterface
{
    /**
     * @param string $tournamentUuid
     * @param Team[] $teams
     * @return void
     */
    public function create(string $tournamentUuid, array $teams): void;
}
