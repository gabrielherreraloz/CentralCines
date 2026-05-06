@include('header')

<div class="container text-center mt-5">

    <h2>Sesión: {{ \Carbon\Carbon::parse($sesion->horario)->format('d/m/Y H:i') }}</h2>

    <h4 class="mb-4">Selecciona tu butaca</h4>

    {{-- PANTALLA --}}
    <div class="bg-dark text-white p-2 mb-4 rounded">
        PANTALLA
    </div>

    {{-- BUTACAS --}}
    <div class="d-flex flex-column align-items-center">

        @foreach ($butacas->groupBy('fila') as $fila => $asientos)

            <div class="mb-2">

                <strong>Fila {{ $fila }}</strong><br>

                @foreach ($asientos as $butaca)

                    @if($butaca->ocupada)

                        <button class="btn btn-danger m-1" disabled>
                            {{ $butaca->numero }}
                        </button>

                    @else

                        <form method="POST" action="/butaca/reservar" style="display:inline;">
                            @csrf

                            <input type="hidden" name="butaca_id" value="{{ $butaca->id }}">

                            <button class="btn btn-success m-1">
                                {{ $butaca->numero }}
                            </button>
                        </form>

                    @endif

                @endforeach

            </div>

        @endforeach

    </div>

</div>

@include('footer')
