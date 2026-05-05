@include('header')
<body style="background-color: #FFFBED;">
    <div class="container py-5">
        <div class="clearfix">
            <img src="{{asset($pelicula->imagen_url)}}" class="rounded col-md-6 float-md-start mb-3 me-md-5" style="height: 600px; width: 425px;" alt="...">
            <div class="card text-bg-dark h-100 shadow-sm">
                <h2 class="mt-3">
                    {{$pelicula->titulo}}
                </h2>
                <p">
                    Duración: {{$pelicula->duracion}} minutos
                </p>
                <p class="ms-5 me-5">
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
    </div>
</body>
@include('footer')