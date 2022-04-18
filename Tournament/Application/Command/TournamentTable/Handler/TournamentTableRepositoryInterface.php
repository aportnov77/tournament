<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

interface TournamentTableRepositoryInterface
{
    public function addWon(string $tournamentUuid, string $playerUuid): void;

    public function addDrow(string $tournamentUuid, string $playerAUuid, string $playerBUuid): void;

    public function addLoss(string $tournamentUuid, string $playerUuid): void;
}
