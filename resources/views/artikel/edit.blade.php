@extends('layouts.master', ['title' => 'Edit Artikel'])

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-body">
                <form action="/artikel/{{ $article->id }}" method="post">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea class="form-control" name="content" id="content" rows="5">{{ nl2br($article->content) }}</textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag" class="d-block">Tags</label>
                        <select class="form-control" name="tags[]" id="tag" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-success float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop