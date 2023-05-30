@extends('layouts.admin')

@section('content')
    <a class="btn btn-secondary" href="{{ route('admin.technologies.create') }}">
        Crea nuovo
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Projects</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                    <td>{{ count($technology->projects) }}</td>

                    <td class="d-flex gap-1">
                        <a class="btn btn-warning" href="{{ route('admin.technologies.edit', $technology->slug) }}">
                            Modifica
                        </a>
                        <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->slug]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button technology="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
