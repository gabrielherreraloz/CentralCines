@include('header')

<style>
    .cinema-room {
        width: 95vw;
        max-width: 1200px;
        background-color: #2b2b2b;
    }

    .seat {
        width: 48px;
        height: 48px;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .seat:hover {
        transform: scale(1.08);
    }

    .selected {
        background-color: #0d6efd !important;
    }

    .occupied {
    background-color: #dc3545 !important;
    opacity: 0.7;
    cursor: not-allowed;
    pointer-events: none;
}

    @media (max-width: 768px) {
        .seat {
            width: 34px;
            height: 34px;
            font-size: 11px;
        }
    }

    @media (max-width: 480px) {
        .seat {
            width: 26px;
            height: 26px;
            font-size: 10px;
        }
    }
</style>

<div class="d-flex justify-content-center py-5">

<div class="cinema-room p-4 rounded shadow">

    <h2 class="text-white text-center mb-4">
        Selección de butacas - Sesión {{ $sesion->id }}
    </h2>

    <!-- SALA -->
    @for($fila = 5; $fila >= 1; $fila--)

        <div class="d-flex justify-content-center align-items-center mb-3">

            <!-- FILA -->
            <div class="text-white me-3 fw-bold" style="width:90px;">
                Fila {{ $fila }}
            </div>

            <!-- IZQUIERDA -->
            <div class="d-flex gap-2">

                @for($asiento = 1; $asiento <= 5; $asiento++)

                    @php
                        $id = ($fila - 1) * 10 + $asiento;
                        $ocupada = in_array($id, $butacasOcupadasIds);
                    @endphp

                    <div class="seat d-flex justify-content-center align-items-center rounded text-white
                        {{ $ocupada ? 'occupied' : 'bg-success' }}"
                        data-id="{{ $id }}">
                        {{ $id }}
                    </div>

                @endfor

            </div>

            <!-- PASILLO -->
            <div class="mx-4"></div>

            <!-- DERECHA -->
            <div class="d-flex gap-2">

                @for($asiento = 6; $asiento <= 10; $asiento++)

                    @php
                        $id = ($fila - 1) * 10 + $asiento;
                        $ocupada = in_array($id, $butacasOcupadasIds);
                    @endphp

                    <div class="seat d-flex justify-content-center align-items-center rounded text-white
                        {{ $ocupada ? 'occupied' : 'bg-success' }}"
                        data-id="{{ $id }}">
                        {{ $id }}
                    </div>

                @endfor

            </div>

        </div>

    @endfor

    <!-- PANTALLA ABAJO -->
    <div class="mt-4 bg-dark text-white text-center py-3 rounded shadow">
        PANTALLA
    </div>

    <!-- FORM RESERVA -->
    <form method="POST" action="{{ route('reservar') }}" class="text-center mt-4">
        @csrf

        <input type="hidden" name="butacas" id="butacasInput">
        <input type="hidden" name="sesion_id" value="{{ $sesion->id }}">

        <button type="submit" class="btn btn-primary px-5">
            Reservar
        </button>
    </form>

</div>

</div>

<script src="{{ asset('js/butacas.js') }}"></script>

@include('footer')