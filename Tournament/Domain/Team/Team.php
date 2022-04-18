<?php

declare(strict_types=1);

namespace Tournament\Domain\Team;


class Team
{
    public function __construct(private string $uuid, private string $tournamentUuid, private string $name, private int $power)
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
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }
}
