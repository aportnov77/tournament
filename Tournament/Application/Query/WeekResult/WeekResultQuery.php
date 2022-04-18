<?php

namespace Tournament\Application\Query\WeekResult;

class WeekResultQuery
{

    public function __construct(private int $weekNumber)
    {
    }

    /**
     * @return int
     */
    public function getWeekNumber(): int
    {
        return $this->weekNumber;
    }
}
