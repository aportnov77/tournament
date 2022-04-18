<?php

namespace Tournament\Infrastructure;

use Tournament\Domain\Team\Team;
use Tournament\Infrastructure\Models\TeamEloquentModel;

class TeamRepository implements \Tournament\Application\Command\Tournament\Handler\TeamsRepositoryInterface,
                                \Tournament\Application\Query\Teams\Handler\TeamsListRepositoryInterface,
                                \Tournament\Application\Command\Play\Handler\TeamRepositoryInterface
{

    /**
     * @param Team $teams
     * @return void
     */
    public function saveAll(array $teams): void
    {
        foreach ($teams as $team) {
            /** @var Team $team */
            TeamEloquentModel::create([
                                          'uuid' => $team->getUuid(),
                                          'tournamentUuid' => $team->getTournamentUuid(),
                                          'name' => $team->getName(),
                                          'power' => $team->getPower()
                                      ]);
        }
    }

    /**
     * @return Team[]
     */
    public function getAllByTournamentUuid(string $tournamentUuid): array
    {
        $result = [];
        foreach (TeamEloquentModel::where('tournamentUuid', $tournamentUuid)->get() as $model) {
            $result[] = new Team($model->uuid, $model->tournamentUuid, $model->name, $model->power);
        }
        return $result;
    }

    public function getTeamByUuid(string $uuid): Team
    {
        $model = TeamEloquentModel::findOrFail($uuid);
        return $this->mapModelToDomain($model);
    }

    private function mapModelToDomain(TeamEloquentModel $model)
    {
        return new Team($model->uuid, $model->tournamentUuid, $model->name, $model->power);
    }
}
