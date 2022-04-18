<?php

namespace Tournament\Infrastructure;

use Tournament\Application\Command\Tournament\Handler\TournamentTableCreatorInterface;
use Tournament\Application\Command\TournamentTable\Handler\TournamentTableGDRegistratorInterface;
use Tournament\Application\Command\TournamentTable\Handler\TournamentTableRepositoryInterface;
use Tournament\Application\Query\Tournament\Handler\TournamentTableResultInterface;
use Tournament\Application\Query\Tournament\TournamentTableItemDTO;
use Tournament\Infrastructure\Models\TournamentTableEloquentModel;

class TournamentTableRepository implements TournamentTableCreatorInterface,
                                           TournamentTableRepositoryInterface,
                                           TournamentTableGDRegistratorInterface,
                                           TournamentTableResultInterface
{

    public function create(string $tournamentUuid, array $teams): void
    {
        foreach ($teams as $team) {
            TournamentTableEloquentModel::create([
                                                     'tournamentUuid' => $tournamentUuid,
                                                     'playerUuid' => $team->getUuid(),
                                                     'playerName' => $team->getName(),
                                                     'played' => 0,
                                                     'won' => 0,
                                                     'drow' => 0,
                                                     'loss' => 0,
                                                     'gd' => 0
                                                 ]);
        }
    }

    public function addWon(string $tournamentUuid, string $playerUuid): void
    {
        TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->where(
            'playerUuid',
            $playerUuid
        )->increment('won');
        TournamentTableEloquentModel::where([
                                                ['tournamentUuid', '=', $tournamentUuid],
                                                ['playerUuid', '=', $playerUuid]
                                            ]
        )->increment('played', 1);
    }

    public function addDrow(string $tournamentUuid, string $playerAUuid, string $playerBUuid): void
    {
        TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->where(
            'playerUuid',
            $playerAUuid
        )->increment('drow');
        TournamentTableEloquentModel::where([
                                                ['tournamentUuid', '=', $tournamentUuid],
                                                ['playerUuid', '=', $playerAUuid]
                                            ])->increment('played', 1);

        TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->where(
            'playerUuid',
            $playerBUuid
        )->increment('drow');
        TournamentTableEloquentModel::where([
                                                ['tournamentUuid', '=', $tournamentUuid],
                                                ['playerUuid', '=', $playerBUuid]
                                            ])->increment('played', 1);
    }

    public function addLoss(string $tournamentUuid, string $playerUuid): void
    {
        TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->where(
            'playerUuid',
            $playerUuid
        )->increment('loss');
        TournamentTableEloquentModel::where([
                                                ['tournamentUuid', '=', $tournamentUuid],
                                                ['playerUuid', '=', $playerUuid]
                                            ])->increment('played', 1);
    }

    public function registerGD(string $tournamentUuid, string $playerUuid, int $gd): void
    {
        TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->where(
            'playerUuid',
            $playerUuid
        )->increment('gd', $gd);
    }

    public function getTournamentTable(string $tournamentUuid): array
    {
        $result = [];
        $items = TournamentTableEloquentModel::where('tournamentUuid', $tournamentUuid)->orderBy('won', 'desc')->get();
        foreach ($items as $item) {
            $result[] = new TournamentTableItemDTO(
                $item->playerName,
                $item->played,
                $item->won,
                $item->loss,
                $item->drow,
                $item->gd
            );
        }
        return $result;
    }
}
