<?php

namespace Tournament\Application\Command\Tournament\Handler;

use Tournament\Domain\Team\Team;

interface TeamsRepositoryInterface
{
    /**
     * @param Team[] $teams
     * @return void
     */
    public function saveAll(array $teams): void;

    /**
     * @param string $tournamentUuid
     * @return Team[]
     */
    public function getAllByTournamentUuid(string $tournamentUuid): array;
}
