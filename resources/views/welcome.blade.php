@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row p-3">
            @foreach ($projects as $project)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <p>
                                @foreach ($project->technologies as $technology)
                                    <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
                                @endforeach
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Type:
                                    {{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</li>
                                <li class="list-group-item">Client: {{ $project->client }}</li>
                            </ul>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">Vedi</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
