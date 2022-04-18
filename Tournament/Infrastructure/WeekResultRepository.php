<?php

namespace Tournament\Infrastructure;

use Tournament\Application\Query\WeekResult\Handler\WeekResultRepositoryInterface;
use Tournament\Application\Query\WeekResult\WeekResultItemDTO;

class WeekResultRepository implements WeekResultRepositoryInterface
{

    public function getWeekResult(int $weekNumber): WeekResultDTO
    {
        // TODO: Implement getWeekResult() method.
    }

    /**
     * @param string $weekUuid
     * @return WeekResultItemDTO
     */
    public function getAllWeeksResult(string $weekUuid): array
    {
        // TODO: Implement getAllWeeksResult() method.
    }
}
