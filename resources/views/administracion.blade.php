@include('header')

<div class="container mt-4">
    <div class="d-flex gap-2 justify-content-center bg-dark p-3 rounded shadow-sm border border-secondary">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAñadirPelicula">
            <i class="bi bi-plus-circle"></i> Añadir película
        </button>
    </div>
</div>

<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($peliculas as $pelicula)
        <div class="col mb-4">
            <div class="card text-bg-dark h-100 shadow-sm">
                <img src="{{ asset($pelicula->imagen_url) }}" class="card-img-top" style="height: auto; object-fit: cover;" alt="Poster de '{{$pelicula->titulo}}'">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-3">{{ $pelicula->titulo }}</h5>
                    
                    <form action="{{ route('pelicula.detalles', $pelicula->id) }}" method="GET" class="mb-3">
                        <div class="row g-2">
                            <div class="col-12 col-md-6">
                                <input type="date" class="form-control" id="fecha_{{$pelicula->id}}" name="fecha_sesion" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="submit" class="btn btn-info w-100">Ver sesiones</button>
                            </div>
                        </div>
                    </form>

                    <div class="row g-2 mt-auto mb-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-warning w-100 btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificar{{ $pelicula->id }}">
                                Modificar Película
                            </button>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('pelicula.eliminar', $pelicula->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar la película {{ $pelicula->titulo }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100 btn-sm">Eliminar Película</button>
                            </form>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalSesiones{{ $pelicula->id }}">
                                <i class="bi bi-calendar3"></i> Modificar Sesiones
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="modalAñadirPelicula" tabindex="-1" aria-labelledby="modalAñadirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAñadirLabel">Añadir Nueva Película</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('pelicula.aniadir') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nuevo_titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="nuevo_titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="nueva_descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="nueva_descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nueva_imagen_url" class="form-label">URL de la Imagen</label>
                        <input type="text" class="form-control" id="nueva_imagen_url" name="imagen_url">
                    </div>
                    <div class="mb-3">
                        <label for="nueva_duracion" class="form-label">Duración (minutos)</label>
                        <input type="number" class="form-control" id="nueva_duracion" name="duracion" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar Película</button>
                </div>
            </form>

        </div>
    </div>
</div>

@foreach ($peliculas as $pelicula)
    <div class="modal fade" id="modalSesiones{{ $pelicula->id }}" tabindex="-1" aria-labelledby="modalSesionesLabel{{ $pelicula->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSesionesLabel{{ $pelicula->id }}">Sesiones: {{ $pelicula->titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold border-bottom pb-2 mb-2 text-secondary">Sesiones programadas actualmente</h6>

                    @if($pelicula->sesiones->isEmpty())
                        <p class="text-muted text-center py-2 small">Esta película no tiene sesiones asignadas.</p>
                    @else
                    
                        <div class="table-responsive border rounded mb-3 bg-light" style="max-height: 180px; overflow-y: auto;">
                            <table class="table table-sm table-hover align-middle mb-0 text-center" style="font-size: 0.9rem;">
                                <thead class="table-dark sticky-top"> 
                                    <tr>
                                        <th scope="col" class="py-1 text-start ps-3">Fecha y Hora</th>
                                        <th scope="col" class="py-1">Sala</th>
                                        <th scope="col" class="py-1 text-center pe-3">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pelicula->sesiones as $sesion)
                                        <tr>
                                            <td class="text-start ps-3 py-1">
                                                <i class="bi bi-clock text-primary me-1" style="font-size: 0.8rem;"></i>
                                                {{ date('d/m/Y - H:i', strtotime($sesion->horario)) }}
                                            </td>
                                            <td class="py-1">
                                                <span class="badge bg-secondary">Sala {{ $sesion->id_sala }}</span>
                                            </td>
                                            <td class="py-1 text-center pe-3">
                                                <form action="{{ route('sesion.eliminarsesion', $sesion->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta sesión?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm py-0 px-2 style-btn-tabla" title="Eliminar sesión" style="font-size: 0.75rem;">
                                                        <i class="bi bi-trash"></i>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h6 class="fw-bold border-bottom pb-2 mb-3 text-secondary">Añadir nueva sesión</h6>
                    <form action="{{ route('sesion.crearsesion') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pelicula" value="{{ $pelicula->id }}">
                        <div class="mb-3">
                            <label class="form-label text-muted mb-1">Seleccionar Sala</label>
                            <select class="form-select" name="id_sala" required>
                                <option value="" disabled selected>Elige una sala</option>
                                @foreach($salas as $sala)
                                    <option value="{{ $sala->id }}">Sala {{ $sala->id }} ({{ $sala->butacas }} butacas)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted mb-1">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" name="horario" min="{{ now()->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-plus-circle"></i> Agregar Sesión
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalModificar{{ $pelicula->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $pelicula->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $pelicula->id }}">Modificar Película: {{ $pelicula->titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pelicula.modificar', $pelicula->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo{{ $pelicula->id }}" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo{{ $pelicula->id }}" name="titulo" value="{{ $pelicula->titulo }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion{{ $pelicula->id }}" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion{{ $pelicula->id }}" name="descripcion" rows="3" required>{{ $pelicula->descripcion }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imagen_url{{ $pelicula->id }}" class="form-label">URL de la Imagen (Opcional)</label>
                            <input type="text" class="form-control" id="imagen_url{{ $pelicula->id }}" name="imagen_url" value="{{ $pelicula->imagen_url }}">
                        </div>
                        <div class="mb-3">
                            <label for="duracion{{ $pelicula->id }}" class="form-label">Duración (minutos)</label>
                            <input type="number" class="form-control" id="duracion{{ $pelicula->id }}" name="duracion" value="{{ $pelicula->duracion }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach

@include('footer')