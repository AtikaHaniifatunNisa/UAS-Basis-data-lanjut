<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="container mt-5">
        <h1 class="text-center">Edit Postingan</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $post->user_id }}" required>
            </div>
    
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>
    
            <div class="form-group">
                <label for="content">Konten:</label>
                <textarea name="content" id="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
            </div>
    
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="publish" {{ $post->status == 'publish' ? 'selected' : '' }}>Publish</option>
                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary btn-block">Perbarui</button>
        </form>
    </div>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>