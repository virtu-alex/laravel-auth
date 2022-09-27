@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Lista Post</h1>
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">
            <i class="fa-solid fa-plus my-2"></i> Nuovo Post</a>
    </header>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il </th>
                <th scope="col">Modificato il </th>
                <th>Bottoni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.show', $post) }}">Mostra</a>
                    </td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h3 class="text-center">Nessun Post</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
