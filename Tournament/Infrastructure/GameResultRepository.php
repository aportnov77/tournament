<?php

namespace Tournament\Infrastructure;

use Tournament\Application\Command\GameResult\Handler\GameResultRepositoryInterface;
use Tournament\Infrastructure\Models\GameResultEloquentModel;

class GameResultRepository implements GameResultRepositoryInterface
{

    public function save(
        string $weekUuid,
        string $playerAUuid,
        string $playerBUuid,
        int $playerAGoals,
        int $playerBGoals
    ) {
        GameResultEloquentModel::create([
                                            'weekUuid' => $weekUuid,
                                            'playerAUuid' => $playerAUuid,
                                            'playerBUuid' => $playerBUuid,
                                            'playerAGoals' => $playerAGoals,
                                            'playerBGoals' => $playerBGoals
                                        ]);
    }
}
