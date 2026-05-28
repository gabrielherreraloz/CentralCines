@include('header')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($peliculas as $pelicula)
        <div class="col mb-4">
            <div class="card text-bg-dark h-100 shadow-sm">
                <img src="{{asset($pelicula->imagen_url)}}" class="card-img-top" style="height: auto; object-fit: cover;" alt="Poster de la película '{{$pelicula->titulo}}'">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        {{ $pelicula->titulo }}
                    </h5>
                    <p class="card-text flex-grow-1">
                        {{ Str::limit($pelicula->descripcion, 200, '...') }}
                    </p>
                    <form action="{{ route('pelicula.detalles', $pelicula->id, ) }}" method="GET">
                        <div class="row g-2">
                            <div class="col-12 col-md-6">
                                <input type="date" class="form-control mb-1" id="fecha" name="fecha_sesion" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="submit" class="btn btn-info w-100" value="Ver sesiones">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('footer')