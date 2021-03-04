@extends('app')
@section('content')
@component('components.card')
    @slot('header_title', 'Nuevo conductor')
    @slot('body')
    <form action="{{ route('conductores.store') }}" method="post" autocomplete="off">
        @include('conductores._save')
        <br>
        <button class="btn btn-success">Guardar conductor</button>
        <a href="{{ route('conductores.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
    @endslot
@endcomponent
@endsection
