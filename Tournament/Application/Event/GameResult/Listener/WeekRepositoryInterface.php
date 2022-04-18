<?php

namespace Tournament\Application\Event\GameResult\Listener;

use Tournament\Domain\Week\Week;

interface WeekRepositoryInterface
{
    public function getWeek(string $weekUuid): Week;
}
