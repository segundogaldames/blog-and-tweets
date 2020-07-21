@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card-header">Bienvenido(a) {{ Auth()->user()->name }}</div>
            <h2 class="mt-3">My Entries</h2>
            @foreach ($entries as $entry)
            <div class="card mt-4">
                <div class="card-header"><a href="{{ route('entries.show', $entry) }}">{{ $entry->title }}</a></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
