@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Entry</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('entries.update', $entry) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>

                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ $entry->title }}" required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="contenido" id="" rows="4"
                                class="form-control @error('contenido') is-invalid @enderror" name="contenido" required
                                style="resize:none">{{ $entry->contenido }}</textarea>
                            @error('contenido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection