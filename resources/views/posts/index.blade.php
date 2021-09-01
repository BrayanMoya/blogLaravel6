@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Artículos
                        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right">
                            <i class="bi-plus"></i>Nuevo artículo
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <th>{{ $post->title }}</th>
                                    <th>
                                        <a href=" {{ route('posts.edit', $post) }}"
                                           class="btn btn-outline-primary btn-sm">Editar</a>
                                    </th>
                                    <th>
                                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar" class="btn btn-sm btn-outline-danger"
                                                   onClick=" return confirm('¿Desea eliminar el registro?')">
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
