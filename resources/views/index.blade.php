@include('header')
<body style="background-color: #FFFBED;">
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($peliculas as $peli)
            <div class="col mb-4">
                <div class="card text-bg-dark h-100 shadow-sm">
                    <img src="{{asset($peli->imagen_url)}}" class="card-img-top" alt="{{ $peli->titulo }}" style="height: 600px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            {{ $peli->titulo }}
                        </h5>
                        <p class="card-text flex-grow-1">
                            {{ Str::limit($peli->descripcion, 200, '...') }}
                        </p>
                        <a href="#" class="btn btn-info w-100">
                            Ver sesiones
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</body>
@include('footer')