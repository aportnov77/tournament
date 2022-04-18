<?php

namespace Tournament\Application\Command\GameResult\Handler;

interface GameResultRepositoryInterface
{
    public function save(
        string $weekUuid,
        string $playerAUuid,
        string $playerBUuid,
        int $playerAGoals,
        int $playerBGoals
    );
}
