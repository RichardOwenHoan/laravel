@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Add Articles</a>

        </div>

        <div class="row">
            @foreach ($articles as $article)
                <a href="{{ route('articles.show', ["id" => $article->id]) }}" class="card col-3">
                    <div class="card-body">
                        {{ $article->title }}
                        <p>
                            {{ $article->description }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
