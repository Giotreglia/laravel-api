@extends('layouts.admin')

@section('content')
    <form class="my-3" method="POST" action="{{ route('admin.projects.update', ['project' => $project->slug]) }}"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" id="floatingTextarea" class="form-control @error('description') is-invalid @enderror"
                id="description" name="description">
            {{ old('description', $project->description) }}
        </textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Url immagine</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                value="{{ old('image', $project->image) }}">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client" class="form-label">Prezzo</label>
            <input type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client"
                value="{{ old('client', $project->client) }}">
            @error('client')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Selezione tipologia</label>

            <select class="form-select" @error('type_id') is-invalis @enderror name="type_id" id="type_id">
                <option @selected(old('type_id', $project->type_id) == '') value="">Nessuna categoria</option>
                @foreach ($types as $type)
                    <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <span class="mb-2 d-block">Tecnologie</span>
            @foreach ($technologies as $technology)
                <div class="form-check form-switch">
                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" role="switch"
                            id="technologies{{ $technology->id }}" name="technologies[]"
                            @if (in_array($technology->id, old('technologies', []))) checked @endif value="{{ $technology->id }}">
                    @else
                        <input class="form-check-input" type="checkbox" role="switch"
                            id="technologies{{ $technology->id }}" name="technologies[]"
                            @if ($project->technologies->contains($technology->id)) checked @endif value="{{ $technology->id }}">
                    @endif
                    <label class="form-check-label"
                        for="technologies{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
            @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <button type="reset" class="btn btn-warning">Annulla</button>

    </form>
@endsection
