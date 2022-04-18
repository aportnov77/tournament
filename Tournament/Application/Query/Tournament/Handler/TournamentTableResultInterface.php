<?php

namespace Tournament\Application\Query\Tournament\Handler;

use Tournament\Application\Query\Tournament\TournamentTableItemDTO;

interface TournamentTableResultInterface
{
    /**
     * @param TournamentTableItemDTO[] $tournamentUuid
     * @return array
     */
    public function getTournamentTable(string $tournamentUuid): array;
}
