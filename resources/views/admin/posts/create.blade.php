@extends('layouts.app')

@section('content')
    <header>
        <h1>Crea Post</h1>
    </header>
    <hr />
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required minlenght="5" maxlenght="50">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control" id="content" name="content" required>
                        {{ old('content') }}
                    </textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="form-group">
                    <label for="image">Immagine</label>
                    <input type="url" class="form-control" id="image" name="image" value="{{ old('image') }}">
                </div>
            </div>
            <div class="col-1">
                <img class="img-fluid"
                    src="https://ralfvanveen.com/wp-content/uploads/2021/06/Placeholder-_-Begrippenlijst.svg"
                    alt="post image preview" id="preview">
            </div>
        </div>
        <hr />
        <footer class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">
                <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
            </a>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
            </button>
        </footer>
    </form>
@endsection
