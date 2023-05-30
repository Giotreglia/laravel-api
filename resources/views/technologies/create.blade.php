@extends('layouts.admin')

@section('content')
    <form class="my-3" method="POST" action="{{ route('admin.technologies.store') }}">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Nome nuova tipologia</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <button type="reset" class="btn btn-warning">Annulla</button>

    </form>
@endsection
