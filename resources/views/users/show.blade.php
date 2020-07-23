@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-header">Tweets</div>
        </div>
        <div class="col-md-8">
            @include('partials._messages')
            <div class="card">

                <div class="card-header">{{ $user->name }}</div>

                @foreach ($user->entries as $entry)
                    <div class="card-header"><a href="{{ route('entries.show',$entry) }}">{{ $entry->title }}</a></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection