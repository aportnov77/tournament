<?php

namespace Tournament\Application\Command\TournamentTable;

class RegisterDrowCommand
{
    public function __construct(private string $tournamentUuid, private string $playerAUuid, private string $playerBUuid)
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
    public function getPlayerAUuid(): string
    {
        return $this->playerAUuid;
    }

    /**
     * @return string
     */
    public function getPlayerBUuid(): string
    {
        return $this->playerBUuid;
    }


}
