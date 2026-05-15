@include('header')
<div class="container py-5 text-white">
    <div class="mx-auto p-5 rounded"
         style="max-width:700px;
            background:rgba(40,40,40,0.95);">

        <h2 class="text-center mb-4">
            Confirmación de compra
        </h2>
        
        <div class="text-center text-white mb-3">
            <h4 class="text-warning">
            🎬 {{ $sesion->pelicula->titulo }}
            </h4>
            <p>
            🕒 {{ \Carbon\Carbon::parse($sesion->horario)->format('d/m/Y H:i') }}
            </p>
        </div>

        <div class="mb-4">
            <h4>Butacas seleccionadas:</h4>
            <div class="d-flex flex-wrap gap-2 mt-3">
                @foreach($butacas as $b)
                    <div class="bg-success px-3 py-2 rounded">
                        Fila {{ $b->fila }}
                        -
                        Asiento {{ $b->asiento }}
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <div class="text-center mt-4">
            <h3>
                Total:
                <span class="text-warning">
                    {{ $total }} €
                </span>
            </h3>

            <p class="text-secondary">
                {{ count($butacas) }} butacas × 8€
            </p>

        </div>

        //Para que no reserve 0 butacas
        @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST"
              action="{{ route('reservar') }}"
              class="text-center mt-4">
            @csrf

            <input type="hidden"
                   name="butacas"
                   value="{{ implode(',', $butacas->pluck('id')->toArray()) }}">
            <input type="hidden"
                   name="sesion_id"
                   value="{{ $sesion->id }}">
            <button type="submit"
                    class="btn btn-success btn-lg px-5">

                Confirmar compra
            </button>
        </form>
    </div>
</div>
@include('footer')