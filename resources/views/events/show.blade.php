@extends('layouts.main')

@section('title', 'Detalhes do Evento: {{ $event->title }}')

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            @if($event->image)
            <img src="/images/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            @else
            <img src="/images/event_placeholder.jpg" class="img-fluid" alt="{{ $event->title }}">
            @endif
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
            <p class="event-date"><ion-icon name="calendar-outline"></ion-icon>{{ date('d/m/y',strtotime($event->date)) }}</p>
            <p class="events-participantes"><ion-icon name="people-outline"></ion-icon> {{count($event->users)}} Participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
            @if(!$hasUserJoined)
            <form action="/events/join/{{ $event->id }}" method="post">
                @csrf
                <a 
                    href="/events/join/{{ $event->id }}" 
                    id="event-submit" 
                    class="btn btn-primary"
                    onclick="event.preventDefault();
                    this.closest('form').submit()"
                    >Confirmar Presença</a>
            </form>
            @else
            <p id="info-container" class="already-joined-msg">Você já está participando deste evento!</p>
            @endif
            @if($event->items)
            <h3>O Evento conta com: </h3>
            <ul id="items-list">
                @foreach($event->items as $item)
                    <li><ion-icon name="play-outline"></ion-icon>{{ $item }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>
@endsection