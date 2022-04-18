<?php

namespace Tournament\Domain\Week;

class Game
{

    public function __construct(private string $playerAUuid, private string $playerBUuid)
    {
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
