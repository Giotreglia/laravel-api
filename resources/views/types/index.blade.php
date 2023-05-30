@extends('layouts.admin')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Projects</th>
                {{-- <th scope="col">Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ count($type->projects) }}</td>

                    {{--                     <td class="d-flex gap-1">
                        <a class="btn btn-warning" href="{{ route('admin.types.edit', $type->slug) }}">
                            Modifica
                        </a>
                        <form action="{{ route('admin.types.destroy', ['type' => $type->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
