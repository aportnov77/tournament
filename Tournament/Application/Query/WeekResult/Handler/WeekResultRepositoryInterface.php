<?php

namespace Tournament\Application\Query\WeekResult\Handler;

use Tournament\Application\Query\WeekResult\WeekResultDTO;

interface WeekResultRepositoryInterface
{
    public function getWeekResult(int $weekNumber): WeekResultDTO;

    /**
     * @param string $weekUuid
     * @return WeekResultDTO
     */
    public function getAllWeeksResult(string $weekUuid): array;
}
