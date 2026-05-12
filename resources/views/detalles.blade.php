@include('header')
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        <img src="{{asset($pelicula->imagen_url)}}" class="rounded col-11 col-lg-6 mb-3" style="height: auto; max-width: 100%;" alt="Poster de la película '{{$pelicula->titulo}}'">
        <div class="card text-bg-dark h-100 col-11 col-lg-6">
            <div class="text-start ms-5 me-lg-5 mt-5 mb-5">
                <h2>
                    {{$pelicula->titulo}}
                </h2>
                <p>
                    Duración: {{$pelicula->duracion}} minutos
                </p>
                <p class="me-4">
                    {{$pelicula->descripcion}}
                </p>
                <p>
                    Seleccionar sesión:
                </p>
                @forelse ($sesions_sala as $id_sala => $sesiones)
                    <div class="me-3">
                        <strong class="row">
                            Sala {{$id_sala}}:
                        </strong> 
                        @foreach ($sesiones as $sesion)
                            <a type="submit" class="btn btn-warning ms-3 mt-3" href="{{route('butacas.sesion', $sesion->id)}}">
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
@include('footer')