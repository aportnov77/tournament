<?php

namespace Tournament\Application\Event\GameResult\Listener;

use Illuminate\Support\Facades\Bus;
use Tournament\Application\Command\GameResult\RegisterGameResultCommand;
use Tournament\Application\Event\GameResult\GameResultEvent;


class GameResultEventListener
{
    public function __invoke(GameResultEvent $event)
    {
        Bus::dispatch(
            new RegisterGameResultCommand(
                $event->getWeekUuid(),
                $event->getPlayerAUuid(),
                $event->getPlayerBUuid(),
                $event->getPlayerAGoals(),
                $event->getPlayerBGoals()
            )
        );
    }

}
