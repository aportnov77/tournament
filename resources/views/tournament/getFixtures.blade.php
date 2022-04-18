<?php
/** @var \Tournament\Application\Query\Week\AllWeeksDTO[] $weeks */

?>
<x-layout>
    <div class="row">
        <div class="col">

            <h1>Teams</h1>

            @foreach($weeks as $week)
                <h1>Week: {{$week->getWeekNumber()}}</h1>
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th scope="col" class="w-50">Team 1</th>
                        <th scope="col" class="w-50">Team 2</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($week->getGames() as $game)
                        <tr>
                            <td>{{ $game->getTeamA()->getName() }}</td>
                            <td>{{ $game->getTeamB()->getName() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach

        </div>
        <div class="col">
            <form method="post" action="/tournament/playAll/{{$tournamentUuid}}">
                @csrf
                <button type="submit" class="btn btn-primary">Play All Games</button>

            </form>
            <hr>

            <form method="post" action="/tournament/playWeek/{{$tournamentUuid}}">
                @csrf
                <button type="submit" class="btn btn-primary">Play Nex Week</button>

            </form>
        </div>
    </div>
</x-layout>
