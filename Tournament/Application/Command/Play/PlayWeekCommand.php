<?php

namespace Tournament\Application\Command\Play;

class PlayWeekCommand
{

    public function __construct(private string $weekUuid)
    {
    }

    /**
     * @return string
     */
    public function getWeekUuid(): string
    {
        return $this->weekUuid;
    }

}
