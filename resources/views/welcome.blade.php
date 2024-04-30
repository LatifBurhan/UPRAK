<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    {{-- START NAV --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GALERY FOTO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    {{-- END NAV --}}

    {{-- START CONTAINER --}}
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-md-4 mb-3">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->caption }}"
                            class="card-img-top">
                        <div class="card-body">
                            <p class="card-text" style="font-family: Arial, Helvetica, sans-serif">{{ $album->caption }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-start" >
                                <div class="col">
                                    <a href="{{ route('komentar', ['id' => $album->id]) }}"><i class="bi bi-chat"></i></a>coment
                                </div>
                                <div class="col">
                                    <a href="#" class="like-btn" data-album-id="{{ $album->id }}"><i class="bi bi-heart"></i></a><span class="like-count">{{ $album->likes }}</span> like
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- END CONTAINER --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil semua tombol "like"
            var likeButtons = document.querySelectorAll('.like-btn');

            // Menambahkan event listener untuk setiap tombol "like"
            likeButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var albumId = this.getAttribute('data-album-id');
                    var likeCountElement = document.querySelector('#likeCount_' + albumId);
                    var currentLikes = parseInt(likeCountElement.innerText);
                    var newLikes = currentLikes + 1;
                    likeCountElement.innerText = newLikes;
    
                    // Di sini Anda dapat menambahkan kode AJAX untuk mengirim permintaan ke server
                    // dan memperbarui jumlah like di database jika diperlukan.
                });
            });
        });
    </script>
</body>

</html>
