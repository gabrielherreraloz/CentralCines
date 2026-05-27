@include('header')

<div class="container py-5 text-white">
    <h2 class="text-center mb-4">Mis entradas</h2>
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    @if($entradas->isEmpty())
        <div class="text-center text-secondary">
            No tienes entradas reservadas
        </div>
    @else
        <div class="row g-3">
            @foreach($entradas as $entrada)
                <div class="col-md-6">
                    <div class="bg-dark p-3 rounded shadow">
                        <h5 class="text-warning">
                            {{ $entrada->sesion->pelicula->titulo }}
                        </h5>
                        <p class="mb-1">
                            Fecha y Hora: {{ $entrada->sesion->horario }}
                        </p>

                        <p class="mb-2">
                            Fila: {{ $entrada->butaca->fila }} -
                            Asiento: {{ $entrada->butaca->asiento }}
                        </p>
                        <form method="POST"
                              action="{{ route('entrada.cancelar', $entrada->id) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Cancelar entrada
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@include('footer')