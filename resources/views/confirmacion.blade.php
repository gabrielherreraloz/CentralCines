@include('header')
<div class="container py-5 text-white">
    <div class="mx-auto p-4 rounded bg-dark" style="max-width:700px;">
        <h2 class="text-center mb-4">Confirmación de compra</h2>
        <h4 class="text-warning text-center">
            {{ $sesion->pelicula->titulo }}
        </h4>
        <p class="text-center">
            {{ $sesion->horario }}
        </p>
        <hr>
            <h5>Butacas:</h5>
            @foreach($butacas as $b)
                <div class="badge bg-success m-1 p-2">
                    F{{ $b->fila }} - A{{ $b->asiento }}
                </div>
            @endforeach
        <hr>
        <h3 class="text-center">
            Total: <span class="text-warning">{{ $total }} €</span>
        </h3>

        <form method="POST" action="{{ route('reservar') }}" class="text-center mt-4">
            @csrf
            <input type="hidden" name="sesion_id" value="{{ $sesion->id }}">
            <input type="hidden" name="butacas"
                   value="{{ implode(',', $butacas->pluck('id')->toArray()) }}">

            <button class="btn btn-success btn-lg">
                Confirmar compra
            </button>
        </form>
    </div>
</div>
@include('footer')