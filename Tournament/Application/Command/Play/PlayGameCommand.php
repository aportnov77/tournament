<?php

namespace Tournament\Application\Command\Play;

class PlayGameCommand
{

    public function __construct(private string $weekUuid, private string $playerAUuid, private string $playerBUuid)
    {
    }

    /**
     * @return string
     */
    public function getWeekUuid(): string
    {
        return $this->weekUuid;
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
