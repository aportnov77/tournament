<?php

namespace Tournament\Application\Command\TournamentTable;

class RegisterLossCommand
{
    public function __construct(private string $tournamentUuid, private string $playerUuid)
    {
    }

    /**
     * @return string
     */
    public function getPlayerUuid(): string
    {
        return $this->playerUuid;
    }

    /**
     * @return string
     */
    public function getTournamentUuid(): string
    {
        return $this->tournamentUuid;
    }
}
