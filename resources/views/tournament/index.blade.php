<x-layout>
    Create New Tournament
    <form method="post" action="/tournament/create">
        @csrf
        <button type="submit" class="btn btn-primary">Create New Tournament</button>

    </form>
</x-layout>
