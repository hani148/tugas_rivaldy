<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Data Post - Rivaldy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
    }

    .form-control {
      border-radius: 10px;
    }

    label {
      font-weight: 600;
      margin-bottom: 6px;
    }

    .btn-custom {
      border-radius: 20px;
      padding: 8px 24px;
    }

    img.preview-img {
      max-width: 220px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .alert-danger {
      border-radius: 8px;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            <h4 class="mb-4 text-center">Edit Post</h4>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="image">Gambar</label><br>
                @if($post->image)
                  <div class="mb-3">
                    <img src="{{ Storage::url('public/posts/' . $post->image) }}" alt="preview" class="preview-img">
                  </div>
                @endif
                <input type="file" class="form-control" name="image" id="image">
              </div>

              <div class="mb-3">
                <label for="title">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="Masukkan Judul Post">
                @error('title')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="content">Konten</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6" placeholder="Masukkan Konten Post">{{ old('content', $post->content) }}</textarea>
                @error('content')
                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <button type="reset" class="btn btn-outline-secondary btn-custom">Reset</button>
              </div>
            </form> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('content');
  </script>
</body>
</html>