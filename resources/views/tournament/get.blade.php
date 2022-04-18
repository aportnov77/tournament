<x-layout>
    <h1>Teams</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">UUID</th>
            <th scope="col">Name</th>
            <th scope="col">Power</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <th scope="row">{{ $loop->index }}</th>
                <td>{{ $team->getUuid() }}</td>
                <td>{{ $team->getName() }}</td>
                <td>{{ $team->getPower() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form method="post" action="/tournament/fixtures/{{$team->getTournamentUuid()}}">
        @csrf
        <button type="submit" class="btn btn-primary">Generate Fixtures</button>

    </form>
</x-layout>
