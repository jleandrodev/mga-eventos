@extends('layouts.main')

@section('title', 'MGA Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar um evento" />
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            @if($event->image)
            <img src="/images/events/{{ $event->image }}" alt="{{ $event->title }}">
            @else
            <img src="/images/event_placeholder.jpg" alt="{{ $event->title }}">
            @endif
            <div class="card-body">
                <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participantes">{{count($event->users)}} Participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <p>Não foram encontrados eventos sobre {{ $search }}...</p>
        <p>
            <a href="/" class="btn btn-primary">Ver todos os eventos</a>
        </p>

        @elseif(count($events) == 0)
        <p>Não existem eventos disponíveis...</p>
        @endif
    </div>
</div>

@endsection