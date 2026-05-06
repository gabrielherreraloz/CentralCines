@include('header')
<body style="background-color: #FFFBED;">
    <div class="container py-5">
        <div class="clearfix">
            <img src="{{asset($pelicula->imagen_url)}}" class="rounded col-md-6 float-md-start mb-3 me-md-5" style="height: 600px; width: 425px;" alt="...">
            <div class="card text-bg-dark h-100 shadow-sm">
                <div class="text-start ms-5 me-5 mt-5 mb-5">
                    <h2>
                        {{$pelicula->titulo}}
                    </h2>
                    <p">
                        Duración: {{$pelicula->duracion}} minutos
                    </p>
                    <p>
                        {{$pelicula->descripcion}}
                    </p>
                    <p>
                        Seleccionar sesión:
                    </p>
                    @forelse ($sesions_sala as $id_sala => $sesiones)
                        <div>
                            <strong>
                                Sala {{$id_sala}}:
                            </strong> 
                            @foreach ($sesiones as $sesion)
                                <a type="submit" class="btn btn-warning ms-3" href="{{route('butacas.sesion', $sesion->id)}}">
                                    {{ \Carbon\Carbon::parse($sesion->horario)->format('H:i') }}
                                </a>
                            @endforeach
                        </div>
                        <br>
                    @empty
                        <strong>
                            No hay ninguna sesión disponible para la fecha seleccionada
                        </strong> 
                    @endforelse
                </div>
                
            </div>
        </div>
    </div>
</body>
@include('footer')