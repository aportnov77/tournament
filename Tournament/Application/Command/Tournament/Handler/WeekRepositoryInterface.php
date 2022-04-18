<?php

namespace Tournament\Application\Command\Tournament\Handler;

use Tournament\Domain\Week\Week;

interface WeekRepositoryInterface
{
    public function saveAll(array $weeks): void;
}
