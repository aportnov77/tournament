<?php

namespace Tournament\Domain\Week;


class Week
{

    public const GAMES_NUMBER = 2;

    public function __construct(private string $uuid, private string $tournamentUuid, private int $weekNumber, private array $games)
    {
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getTournamentUuid(): string
    {
        return $this->tournamentUuid;
    }

    /**
     * @return int
     */
    public function getWeekNumber(): int
    {
        return $this->weekNumber;
    }

    public function createGame(string $playerAUuid, string $playerBUuid): Game
    {
        return new Game($this->weekUuid, $playerAUuid, $playerBUuid);
    }

    public function addGame(Game $game): void
    {
        $this->games[] = $game;
    }

    /**
     * @return Game[]
     */
    public function getGames(): array
    {
        return $this->games;
    }

}
