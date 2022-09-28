@extends('layouts.app')

@section('content')
    <header>
        <h1>
            {{ $post->title }}
        </h1>
    </header>
    <div class="clearfix">
        @if ($post->image)
            <img class="float-left mr-2" src="{{ $post->image }}" alt="{{ $post->slug }}">
        @endif
        <p><strong>Categoria:</strong>
            @if ($post->category)
                {{ $post->category->label }}
            @else
                Nessuna
            @endif
        </p>
        <p>{{ $post->content }}</p>
        <div>
            <strong>Creato il:</strong> {{ $post->created_at }}
            <strong>Modificato il:</strong> {{ $post->updated_at }}
        </div>
    </div>
    <footer class="d-flex align-items-center justify-content-end">
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                <i class="fa solid fa-rotate-left m-2"></i> Indietro
            </a>
            <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}"><i
                    class="fa-solid fa-pencil m-2"></i>
                Modifica</a>

        </div>
        <div class="d-flex align-items-center justify-content-end">
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mx-2" type="submit">
                    <i class="fa-solid fa-trash m-2"></i>Elimina
                </button>
            </form>
        </div>
    </footer>
@endsection
