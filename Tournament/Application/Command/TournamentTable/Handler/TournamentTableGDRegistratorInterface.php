<?php

namespace Tournament\Application\Command\TournamentTable\Handler;

interface TournamentTableGDRegistratorInterface
{
    public function registerGD(string $tournamentUuid, string $playerUuid, int $gd): void;

}
