<?php

namespace Tournament\Application\Command\GameResult\Handler;

use Tournament\Application\Command\GameResult\RegisterGameResultCommand;

class RegisterGameResultCommandHandler
{
    private GameResultRepositoryInterface $repository;

    /**
     * @param GameResultRepositoryInterface $repository
     */
    public function __construct(GameResultRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(RegisterGameResultCommand $command)
    {
        $this->repository->save(
            $command->getWeekUuid(),
            $command->getPlayerAUuid(),
            $command->getPlayerBUuid(),
            $command->getPlayerAGoals(),
            $command->getPlayerBGoals()
        );
    }

}
