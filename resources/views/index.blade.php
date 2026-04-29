<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset = "utf-8" />
        <title>
            CentralCines
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
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
</html>