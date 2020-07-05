@extends('layouts.master', ['title' => 'Lihat Artikel'])

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Judul : {{ $article->title }}</h4>
        <h5>Slug : {{ $article->slug }}</h5>
        <br><br>
        <p>{{ $article->content }}</p>
        <br>
        <br>
        <h6>Tags :</h6>
        @foreach ($article->tags as $tag)
        <a href="#" class="btn btn-success">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
@stop