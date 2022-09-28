@if ($errors->any())
    <div class='alert alert-danger'>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

@if ($post->exists)
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.posts.store') }}" method="POST" novalidate>
@endif
@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $post->title) }}" required minlenght="5" maxlenght="50">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" required>
                    {{ old('content', $post->content) }}
                </textarea>
        </div>
    </div>
    <div class="col-11">
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="url" class="form-control" id="image" name="image"
                value="{{ old('image', $post->image) }}">
        </div>
    </div>
    <div class="col-1">
        <img class="img-fluid pt-4"
            src="{{ $post->image ?? 'https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=' }}"
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
