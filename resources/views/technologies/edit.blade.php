@extends('layouts.admin')

@section('content')
    <form class="my-3" method="POST" action="{{ route('admin.technologies.update', ['technology' => $technology->slug]) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <div>
                <span>Nome originale</span>
                <span class="d-block mb-3 fs-3">{{ old('name', $technology->name) }}</span>
            </div>
            <label for="name" class="form-label">Nome modificato</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <button type="reset" class="btn btn-warning">Annulla</button>

    </form>
@endsection
