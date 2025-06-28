<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas Laravel Post - Rivaldy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
    }

    .table thead {
      background-color: #0d6efd;
      color: #fff;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }

    .btn-custom {
      border-radius: 30px;
      padding: 6px 18px;
    }

    img.rounded {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      object-fit: cover;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="mb-0">Daftar Post</h4>
              <a href="{{ route('posts.create') }}" class="btn btn-success btn-custom">+ Tambah Post</a>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                  <tr>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">JUDUL</th>
                    <th scope="col">CONTENT</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($posts as $post)
                  <tr>
                    <td>
                      <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" width="120" height="80">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td class="text-start">{!! $post->content !!}</td>
                    <td>
                      <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary me-1 btn-custom">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-custom">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4" class="text-center text-danger">Data Post belum tersedia.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
              {{ $posts->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    @if(session()->has('success'))
      toastr.success('{{ session('success') }}', 'Berhasil!');
    @elseif(session()->has('error'))
      toastr.error('{{ session('error') }}', 'Gagal!');
    @endif
  </script>

</body>
</html>