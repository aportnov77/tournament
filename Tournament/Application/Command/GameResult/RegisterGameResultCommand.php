<?php

namespace Tournament\Application\Command\GameResult;

class RegisterGameResultCommand
{
    public function __construct(
        private string $weekUuid,
        private string $playerAUuid,
        private string $playerBUuid,
        private int $playerAGoals,
        private int $playerBGoals
    ) {
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

    /**
     * @return int
     */
    public function getPlayerAGoals(): int
    {
        return $this->playerAGoals;
    }

    /**
     * @return int
     */
    public function getPlayerBGoals(): int
    {
        return $this->playerBGoals;
    }
}
