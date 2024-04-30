<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout dengan Bootstrap</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Foto -->
                <img src="{{ '../storage/' . $foto->image }}" class="img-fluid" alt="Foto">
                <!-- Caption -->
                <div class="mt-3">
                    <h4>{{ $foto->caption }}</h4>
                </div>

                <!-- Form Komentar -->
                <form action="{{ route('post.komentar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                    <div class="form-group mt-3">
                        <label for="comment">Tambahkan Komentar:</label>
                        <textarea class="form-control" id="comment" name="komentar" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($komentar as $komen)
                                <p>{{ $komen->komentar }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
