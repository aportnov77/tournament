<?php

namespace Tournament\Application\Command\Play\Handler;

use Illuminate\Support\Facades\Bus;
use Tournament\Application\Command\Play\PlayGameCommand;
use Tournament\Application\Command\Play\PlayWeekCommand;

class PlayWeekCommandHandler
{
    private WeekRepositoryInterface $repository;

    /**
     * @param WeekRepositoryInterface $repository
     */
    public function __construct(WeekRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(PlayWeekCommand $command)
    {
        $week = $this->repository->getWeek($command->getWeekUuid());
        $games = $week->getGames();

        foreach ($games as $game) {
            Bus::dispatch(
                new PlayGameCommand($command->getWeekUuid(), $game->getPlayerAUuid(), $game->getPlayerBUuid())
            );
        }
    }

}
