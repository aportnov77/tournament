<?php

namespace Tournament\Application\Command\Play\Handler;

use Tournament\Domain\Week\Week;

interface WeekRepositoryInterface
{
    public function getWeek(string $weekUuid): Week;

    /**
     * @return Week[]
     */
    public function getAll(string $tournamentUuid): array;
}
