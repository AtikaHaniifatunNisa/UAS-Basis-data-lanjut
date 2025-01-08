<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="container mt-5">
        <h1 class="text-center">Daftar Postingan</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Buat Postingan Baru</a>

        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Konten</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Dibuat Pada</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="text-center">{{ $post->title }}</td>
                        <td class="text-center">{{ $post->slug }}</td>
                        <td>{{ $post->content }}</td>
                        <td class="text-center"><img src="{{ asset('path/to/images/' . $post->image) }}" alt="{{ $post->title }}" width="100"></td>
                        <td class="text-center">{{ $post->status }}</td>
                        <td class="text-center">{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="text-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>