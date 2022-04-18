<?php

namespace Tournament\Application\Event\GameResult\Listener;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Tournament\Application\Command\TournamentTable\Handler\TournamentTableRepositoryInterface;
use Tournament\Application\Command\TournamentTable\RegisterDrowCommand;
use Tournament\Application\Command\TournamentTable\RegisterGDCommand;
use Tournament\Application\Command\TournamentTable\RegisterLossCommand;
use Tournament\Application\Command\TournamentTable\RegisterWinnerCommand;
use Tournament\Application\Event\GameResult\GameResultEvent;

class TournamentTableListener
{
    private WeekRepositoryInterface $weekRepository;

    /**
     * @param TournamentTableRepositoryInterface $tournamentTableRepository
     * @param WeekRepositoryInterface $weekRepository
     */
    public function __construct(
        TournamentTableRepositoryInterface $tournamentTableRepository,
        WeekRepositoryInterface $weekRepository
    ) {
        $this->tournamentTableRepository = $tournamentTableRepository;
        $this->weekRepository = $weekRepository;
    }


    public function __invoke(GameResultEvent $event)
    {
        $week = $this->weekRepository->getWeek($event->getWeekUuid());

        DB::transaction(function () use ($event, $week) {
            if ($event->getPlayerAGoals() > $event->getPlayerBGoals()) {
                Bus::dispatch(new RegisterWinnerCommand($week->getTournamentUuid(), $event->getPlayerAUuid()));
                Bus::dispatch(new RegisterLossCommand($week->getTournamentUuid(), $event->getPlayerBUuid()));
            } elseif ($event->getPlayerAGoals() < $event->getPlayerBGoals()) {
                Bus::dispatch(new RegisterWinnerCommand($week->getTournamentUuid(), $event->getPlayerBUuid()));
                Bus::dispatch(new RegisterLossCommand($week->getTournamentUuid(), $event->getPlayerAUuid()));
            } else {
                Bus::dispatch(
                    new RegisterDrowCommand(
                        $week->getTournamentUuid(),
                        $event->getPlayerAUuid(),
                        $event->getPlayerBUuid()
                    )
                );
            }

            Bus::dispatch(
                new RegisterGDCommand(
                    $week->getTournamentUuid(),
                    $event->getPlayerAUuid(),
                    $event->getPlayerAGoals() - $event->getPlayerBGoals()
                )
            );
            Bus::dispatch(
                new RegisterGDCommand(
                    $week->getTournamentUuid(),
                    $event->getPlayerBUuid(),
                    $event->getPlayerBGoals() - $event->getPlayerAGoals()
                )
            );
        });
    }

}
