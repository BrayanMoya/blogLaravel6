@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Artículo</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="required">Título</label>
                                <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="file" name="file" class="form-control-file" value="{{ url("storage/app/public/{$post->image}") }}">
                            </div>
                            <div class="form-group">
                                <label class="required">Contenido</label>
                                <textarea name="body" rows="6" class="form-control" required> {{ old('body', $post->body) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Contenido embebido</label>
                                <textarea name="iframe" class="form-control"> {{ old('iframe', $post->iframe) }}</textarea>
                            </div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .form-group label.required:after {
        content: " *";
        font-weight: bold;
        color: #dd4b39;
    }
</style>
