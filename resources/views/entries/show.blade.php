@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">
                @if (Auth()->user()->id === $entry->user_id)
                    <div class="card-header">{{ $entry->title }}</div>
                    <div class="card-body">
                        {{ $entry->contenido }}
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('entries.edit', $entry) }}" class="btn btn-primary">Edit</a>
                    </div>
                @else
                    <div class="card-footer">
                        El dato que consultas no existe
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection