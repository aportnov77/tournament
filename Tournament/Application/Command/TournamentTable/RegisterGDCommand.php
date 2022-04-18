<?php

namespace Tournament\Application\Command\TournamentTable;

class RegisterGDCommand
{

    public function __construct(private string $tournamentUuid, private string $playerUuid, private int $gd)
    {
    }

    /**
     * @return string
     */
    public function getTournamentUuid(): string
    {
        return $this->tournamentUuid;
    }

    /**
     * @return string
     */
    public function getPlayerUuid(): string
    {
        return $this->playerUuid;
    }

    /**
     * @return int
     */
    public function getGd(): int
    {
        return $this->gd;
    }

}
