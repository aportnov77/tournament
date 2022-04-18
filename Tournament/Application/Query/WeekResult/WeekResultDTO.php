<?php

namespace Tournament\Application\Query\WeekResult;

class WeekResultDTO
{

    public function __construct(private array $items)
    {
    }

    /**
     * @return WeekResultItemDTO[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
