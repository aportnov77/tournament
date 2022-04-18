<?php

namespace Tournament\Application\Command\Play\Handler;

use Tournament\Domain\Team\Team;

interface TeamRepositoryInterface
{
    public function getTeamByUuid(string $uuid): Team;
}
