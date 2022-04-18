<?php

namespace Tournament\Domain\Tournament\Event\Handler;

use Tournament\Domain\Tournament\Event\TeamAddedEvent;

class TeamAddedEventHandler
{
    public function __invoke(TeamAddedEvent $event)
    {
        var_dump(1111);
    }

}
