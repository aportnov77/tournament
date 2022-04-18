<?php

namespace Tournament\Application\Query\Week;

class TeamDTO
{

    public function __construct(private string $name)
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
