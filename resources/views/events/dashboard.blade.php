@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-12 dashboard-title-container">
    <h3>Meus Eventos</h3>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td scope="row">{{ count($event->users) }}</td>
                    <td scope="row">
                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/events/{{ $event->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui eventos, <a href="/events/create">clique aqui</a> para criar um evento.</p>
    @endif
</div>
<div class="col-md-12 dashboard-title-container">
    <h3>Eventos que participo:</h3>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($eventsAsParticipant) > 0)
    <table class="table table-bordered table-hover rounded-top">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventsAsParticipant as $event)
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td scope="row">{{ count($event->users) }}</td>
                    <td scope="row">
                        <form action="/events/leave/{{ $event->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="/events/edit/{{ $event->id }}" class="btn btn-danger">
                                <ion-icon name="log-out-outline"></ion-icon> Sair do Evento
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não participa de nenhum evento... <a href="/">Veja todos os eventos.</a></p>
    @endif
</div>
@endsection