<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Tournament\Application\Command\Play\PlayAllWeeksCommand;
use Tournament\Application\Command\Tournament\CreateTournamentCommand;
use Tournament\Application\Command\Tournament\GenerateFixturesCommand;
use Tournament\Application\Query\Teams\TeamsListQuery;
use Tournament\Application\Query\Tournament\TournamentTableQuery;
use Tournament\Application\Query\Week\AllWeeksQuery;
use Tournament\Application\Teams\Query\TeamsQuery;
use Tournament\Domain\Team\Team;
use Tournament\Domain\Tournament\Event\TeamAddedEvent;

class TournamentController extends Controller
{
    public function index(): View
    {
        return view("tournament.index", [
        ]);
    }

    public function create()
    {
        $tournamentUuid = (string)Str::uuid();
        Bus::dispatch(new CreateTournamentCommand($tournamentUuid));

        return redirect("/tournament/{$tournamentUuid}");
    }

    public function get(string $uuid): View
    {
        $teams = Bus::dispatch(new TeamsListQuery($uuid));

        return view("tournament.get", [
            'teams' => $teams
        ]);
    }

    /**
     * @param string $uuid
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createFixtures(string $uuid)
    {
        Bus::dispatch(new GenerateFixturesCommand($uuid));

        return redirect("/tournament/fixtures/{$uuid}");
    }

    public function getFixtures(string $uuid): View
    {
        $weeks = Bus::dispatch(new AllWeeksQuery($uuid));

        return view("tournament.getFixtures", [
            'weeks' => $weeks,
            'tournamentUuid' => $uuid
        ]);
    }

    public function result(string $uuid): View
    {
        $items = Bus::dispatch(new TournamentTableQuery($uuid));

        return view("result.result", [
            'items' => $items,
        ]);
    }

    public function playAll(string $uuid)
    {
        Bus::dispatch(new PlayAllWeeksCommand($uuid));

        return redirect("/tournament/result/{$uuid}");
    }
}
