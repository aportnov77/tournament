<?php

namespace Tournament\Application\Query\Teams\Handler;

use Tournament\Domain\Team\Team;

interface TeamsListRepositoryInterface
{
    /**
     * @return Team[]
     */
    public function getAllByTournamentUuid(string $tournamentUuid): array;
}
