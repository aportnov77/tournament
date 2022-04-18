<?php

namespace Tournament\Application\Command\Play\Handler;

use Illuminate\Support\Facades\Bus;
use Tournament\Application\Command\Play\PlayAllWeeksCommand;
use Tournament\Application\Command\Play\PlayWeekCommand;

class PlayAllWeeksCommandHandler
{
    private WeekRepositoryInterface $repository;

    /**
     * @param WeekRepositoryInterface $repository
     */
    public function __construct(WeekRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(PlayAllWeeksCommand $command)
    {
        $weeks = $this->repository->getAll($command->getTournamentUuid());
        foreach ($weeks as $week){
            Bus::dispatch(new PlayWeekCommand($week->getUuid()));
        }
    }

}
