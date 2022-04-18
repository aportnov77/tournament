<?php
/** @var \Tournament\Application\Query\Tournament\TournamentTableItemDTO[] $items */

?>
<x-layout>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">played</th>
            <th scope="col">won</th>
            <th scope="col">drow</th>
            <th scope="col">loss</th>
            <th scope="col">GD</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th scope="row">{{ $loop->index }}</th>
                <td>{{ $item->getName() }}</td>
                <td>{{ $item->getPlayed() }}</td>
                <td>{{ $item->getWon() }}</td>
                <td>{{ $item->getDrow() }}</td>
                <td>{{ $item->getLoss() }}</td>
                <td>{{ $item->getGd() }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
