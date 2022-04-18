<?php

namespace Tournament\Infrastructure;

use Illuminate\Support\Str;
use Tournament\Application\Command\Tournament\Handler\WeekRepositoryInterface;
use Tournament\Application\Query\Week\AllWeeksDTO;
use Tournament\Application\Query\Week\GameDTO;
use Tournament\Application\Query\Week\TeamDTO;
use Tournament\Domain\Week\Game;
use Tournament\Domain\Week\Week;
use Tournament\Infrastructure\Models\GameEloquentModel;
use Tournament\Infrastructure\Models\WeekEloquentModel;

class WeekRepository implements WeekRepositoryInterface,
                                \Tournament\Application\Query\Week\Handler\WeekRepositoryInterface,
                                \Tournament\Application\Command\Play\Handler\WeekRepositoryInterface,
                                \Tournament\Application\Event\GameResult\Listener\WeekRepositoryInterface
{

    /**
     * @param Week[] $weeks
     * @return void
     */
    public function saveAll(array $weeks): void
    {
        foreach ($weeks as $week) {
            /** @var Week $week */
            WeekEloquentModel::create([
                                          'uuid' => $week->getUuid(),
                                          'tournamentUuid' => $week->getTournamentUuid(),
                                          'weekNumber' => $week->getWeekNumber(),
                                      ]);

            foreach ($week->getGames() as $game) {
                GameEloquentModel::create([
                                              'uuid' => (string)Str::uuid(),
                                              'weekUuid' => $week->getUuid(),
                                              'playerAUuid' => $game->getPlayerAUuid(),
                                              'playerBUuid' => $game->getPlayerBUuid()
                                          ]);
            }
        }
    }

    public function getGames(int $weekNumber): array
    {
        // TODO: Implement getGames() method.
    }

    /**
     * @param string $tournamentUuid
     * @return AllWeeksDTO
     */
    public function getAllWeeksAsAllWeekDTO(string $tournamentUuid): array
    {
        $result = [];
        foreach (WeekEloquentModel::with('games')->where('tournamentUuid', $tournamentUuid)->orderBy('weekNumber')->get() as $model) {
            $games = [];
            foreach ($model->games as $game) {
                $teamA = new TeamDTO($game->teamA->name);
                $teamB = new TeamDTO($game->teamB->name);

                $games[] = new GameDTO($teamA, $teamB);
            }

            $week = new AllWeeksDTO($tournamentUuid, $model->weekNumber, $games);

            $result[] = $week;
        }
        return $result;
    }

    /**
     * @param string $weekUuid
     * @return Week
     */
    public function getWeek(string $weekUuid): Week
    {
        $model = WeekEloquentModel::with('games')->findOrFail($weekUuid);
        return $this->mapModelToDomain($model);
    }

    public function getAll(string $tournamentUuid): array
    {
        $result = [];
        $weeks = WeekEloquentModel::with('games')->where('tournamentUuid', $tournamentUuid)->get();
        foreach ($weeks as $model) {
            $result[] = $this->mapModelToDomain($model);
        }
        return $result;
    }

    /**
     * @param WeekEloquentModel $model
     * @return Week
     */
    private function mapModelToDomain(WeekEloquentModel $model): Week
    {
        $games = [];
        foreach ($model->games as $game) {
            $games[] = new Game($game->playerAUuid, $game->playerBUuid);
        }

        return new Week($model->uuid, $model->tournamentUuid, $model->weekNumber, $games);
    }
}
