<?php


declare(strict_types=1);

namespace Tournament\Domain\Tournament;


use Tournament\Domain\Team\Team;
use Tournament\Domain\Tournament\Event\BaseEvent;
use Tournament\Domain\Tournament\Event\TeamAddedEvent;
use Tournament\Domain\Tournament\Exception\NotEnoughtTeamSizeException;
use Tournament\Domain\Tournament\Exception\TeamAlreadyAddedException;
use Tournament\Domain\Tournament\Exception\TeamSizeExceededException;
use Tournament\Domain\Tournament\Exception\WeekNumberExceededException;
use Tournament\Domain\Week\Game;
use Tournament\Domain\Week\Week;

class Tournament
{
    public const GROUP_SIZE = 4;
    private const WEEK_NUMBER = 6;

    /**
     * @var Team[]
     */
    private array $teams = [];

    private array $weeks = [];

    private string $uuid;

    /**
     * @param string $uuid
     */
    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function addTeam(string $uuid, string $name, int $power): Team
    {
        if (isset($this->teams[$uuid])) {
            throw new TeamAlreadyAddedException();
        }

        if (count($this->teams) === self::GROUP_SIZE) {
            throw new TeamSizeExceededException();
        }

        $this->teams[$uuid] = new Team($uuid, $this->uuid, $name, $power);
        return $this->teams[$uuid];
    }

    /**
     * @param string $uuid
     * @param Game[] $games
     * @return Week
     */
    public function addWeek(string $uuid, array $games): Week
    {
        if (count($this->weeks) === self::WEEK_NUMBER) {
            throw new WeekNumberExceededException();
        }

        $week = new Week($uuid, $this->uuid, count($this->weeks) + 1, $games);
        $this->weeks[] = $week;
        return $week;
    }

}
