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
            <div class="clearfix">
                <img src="{{asset($pelicula->imagen_url)}}" class="rounded col-md-6 float-md-start mb-3 me-md-5" style="height: 600px; width: 425px;" alt="...">
                <h2>
                    {{$pelicula->titulo}}
                </h2>
                <p>
                    Duración: {{$pelicula->duracion}} minutos
                </p>
                <p>
                    {{$pelicula->descripcion}}
                </p>
                <p>
                    Seleccionar sesión:
                </p>
                @foreach ($sesions as $sesion)
                <div>
                    Sala {{$sesion->id_sala}}:
                    <button type="submit" class="btn btn-warning ms-3">
                        {{ \Carbon\Carbon::parse($sesion->horario)->format('H:i') }}
                    </button>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </body>
</html>