<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="container mt-5">
        <h1 class="text-center">Buat Postingan Baru</h1>

        <!-- Menampilkan Pesan -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="number" name="user_id" id="user_id" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="content">Konten:</label>
                <textarea name="content" id="content" class="form-control" required></textarea>
            </div>
    
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>
    
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>