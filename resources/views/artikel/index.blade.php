@extends('layouts.master', ['title' => 'Artikel'])

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/artikel/create" class="btn btn-primary"><i class="fas fa-plus"></i> Buat Artikel</a>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diubah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->slug }}</td>
                        <td>{{ $article->created_at->format('d F Y') }} {{ '(' . $article->created_at->diffForHumans() . ')' }}</td>
                        <td>{{ $article->updated_at->format('d F Y') }}</td>
                        <td>
                            <a href="/artikel/{{ $article->id }}" class="btn btn-info btn-sm mb-2">Lihat</a>
                            <a href="/artikel/{{ $article->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                            <form action="/artikel/{{ $article->id }}" method="post" class="mt-2">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('apa anda yakin?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@push ('scripts')
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        type: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush