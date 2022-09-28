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
                <th scope="col">Categoria</th>
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
                    <td>
                        @if ($post->category)
                            {{ $post->category->label }}
                        @else
                            Nessuna
                        @endif
                    </td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">

                            <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.show', $post) }}"><i
                                    class="fa-solid fa-eye"></i> Mostra</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}"><i
                                    class="fa-solid fa-pencil"></i> Modifica</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="fa-solid fa-trash"></i>Elimina
                            </button>
                        </form>

                    </td>
                    <td> </td>
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
    <nav class="mt-3">
        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif
    </nav>
@endsection
