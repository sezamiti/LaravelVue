@extends('layouts.app')
@section('content')
<div id="app">
   <article-component></article-component>
   <hr>
   <comments-component></comments-component>
    <div class="mt-3">
        <form id="delete-form" action="{{ route('article.destroy', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить новость</button>
        </form>
    </div>
</div>

@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
