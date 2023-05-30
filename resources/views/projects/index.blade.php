@extends('layouts.admin')

@section('content')
    <a class="btn btn-secondary" href="{{ route('admin.projects.create') }}">
        Crea nuovo
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Client</th>
                <th scope="col">Type</th>
                <th scope="col">Slug</th>
                <th scope="col">Technology</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->type?->name }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        @foreach ($project->technologies as $technology)
                            <span class="badge rounded-pill text-bg-primary">{{ $technology->name }}</span>
                        @endforeach
                    </td>
                    <td class="d-flex gap-1">
                        <a class="btn btn-secondary" href="{{ route('admin.projects.show', $project->slug) }}">
                            Dettagli
                        </a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                            Modifica
                        </a>
                        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
