<?php

namespace Tournament\Application\Command\Play\Handler;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Tournament\Application\Command\Play\PlayGameCommand;
use Tournament\Application\Event\GameResult\GameResultEvent;

class PlayGameCommandHandler
{
    private const STEP = 5;

    private TeamRepositoryInterface $teamRepository;

    /**
     * @param TeamRepositoryInterface $teamRepository
     */
    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(PlayGameCommand $command)
    {
        $teamA = $this->teamRepository->getTeamByUuid($command->getPlayerAUuid());
        $teamB = $this->teamRepository->getTeamByUuid($command->getPlayerBUuid());

        $teamAGoals = rand(($teamA->getPower() - self::STEP), $teamA->getPower());
        $teamBGoals = rand(($teamB->getPower() - self::STEP), $teamB->getPower());

        Event::dispatch(
            new GameResultEvent(
                $command->getWeekUuid(),
                $command->getPlayerAUuid(),
                $command->getPlayerBUuid(),
                $teamAGoals,
                $teamBGoals
            )
        );
    }

}
