<?php

namespace Tournament\Application\Query\Week\Handler;

use Tournament\Domain\Week\Week;

interface WeekRepositoryInterface
{
    /**
     * @param int $weekNumber
     * @return Week[]
     */
    public function getGames(int $weekNumber): array;

    /**
     * @param string $tournamentUuid
     * @return Week[]
     */
    public function getAllWeeksAsAllWeekDTO(string $tournamentUuid): array;
}
