<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-3 mt-2">Adicionar</a>

    @isset($sucessMessage)
    <div class="alert alert-success">
        {{$sucessMessage}}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->name }}

                <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>

