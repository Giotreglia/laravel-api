@extends('layouts.admin')

@section('content')
    <div class="container d-flex justify-content-center p-5">
        <div class="col-4">
            <div class="card">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top ms_img"
                        alt="{{ $project->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Type: {{ $project->type?->name }}</li>
                    <li class="list-group-item">Client: {{ $project->client }}</li>
                    <li class="list-group-item">
                        @if (count($project->technologies) > 0)
                            @foreach ($project->technologies as $technology)
                                <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
                            @endforeach
                        @else
                            <span class="badge rounded-pill text-bg-primary">Nessuna tecnologia selezionata</span>
                        @endif
                    </li>
                </ul>
                <a class="btn btn-primary my-2" href="{{ route('admin.projects.index') }}">
                    Torna alla lista
                </a>
                <a class="btn btn-warning my-2" href="{{ route('admin.projects.edit', $project->slug) }}">
                    Modifica
                </a>
            </div>
        </div>

    </div>
@endsection
