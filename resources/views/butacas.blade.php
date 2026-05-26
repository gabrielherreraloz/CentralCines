@include('header')
<div class="container py-4">
    <div class="bg-dark rounded shadow p-3 mx-auto" style="max-width:1100px;">
        <h4 class="text-white text-center mb-3">
            Sesión {{ $sesion->id }}
        </h4>
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('confirmacion.compra') }}">
            @csrf
            <input type="hidden" name="sesion_id" value="{{ $sesion->id }}">
            @for($fila=5;$fila>=1;$fila--)
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <div class="text-white me-2 fw-bold" style="width:70px;">
                        F{{ $fila }}
                    </div>
                    <div class="d-flex gap-1">
                        @for($asiento=1;$asiento<=10;$asiento++)
                            @php
                                $id = ($fila-1)*10 + $asiento;
                                $ocupada = in_array($id, $butacasOcupadasIds);
                            @endphp
                            <input
                                type="checkbox"
                                class="btn-check"
                                id="b{{ $id }}"
                                name="butacas[]"
                                value="{{ $id }}"
                                autocomplete="off"
                                @if($ocupada) disabled @endif
                            >
                            <label class="btn seat-btn {{ $ocupada ? 'btn-danger' : 'btn-success' }}"
                                   for="b{{ $id }}">
                                {{ $asiento }}
                            </label>
                        @endfor
                    </div>
                    <div class="text-white ms-2 fw-bold" style="width:70px;">
                        F{{ $fila }}
                    </div>
                </div>
            @endfor
            <div class="bg-secondary text-white text-center py-2 rounded mt-4 mx-auto" style="max-width:400px;">
                PANTALLA
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-primary px-5">
                    Reservar
                </button>
            </div>
        </form>
    </div>
</div>
@include('footer')