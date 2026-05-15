@include('header')
<div class="container py-5">
    <div class="bg-dark rounded shadow p-3 p-md-4 mx-auto" style="max-width: 1100px;">
        <h4 class="text-white text-center mb-4">
            Sesión {{ $sesion->id }}
        </h4>

        @for($fila = 5; $fila >= 1; $fila--)
            <div class="d-flex justify-content-center align-items-center mb-2 flex-nowrap">
                <div class="text-white me-3 fw-bold" style="width:90px;">
                    Fila {{ $fila }}
                </div>

                <div class="d-flex gap-1 gap-md-2">
                    @for($asiento = 1; $asiento <= 5; $asiento++)
                        @php
                            $id = ($fila - 1) * 10 + $asiento;
                            $ocupada = in_array($id, $butacasOcupadasIds);
                        @endphp
                        <div
                            class="seat btn btn-sm d-flex justify-content-center align-items-center
                            {{ $ocupada ? 'btn-danger disabled' : 'btn-success' }}"
                            data-id="{{ $id }}"
                            style="width:40px;height:40px;">
                            {{ $asiento }}
                        </div>
                    @endfor
                </div>
                
                <div style="width:30px;"></div>
                
                <div class="d-flex gap-1 gap-md-2">
                    @for($asiento = 6; $asiento <= 10; $asiento++)
                        @php
                            $id = ($fila - 1) * 10 + $asiento;
                            $ocupada = in_array($id, $butacasOcupadasIds);
                        @endphp
                        <div
                            class="seat btn btn-sm d-flex justify-content-center align-items-center
                            {{ $ocupada ? 'btn-danger disabled' : 'btn-success' }}"
                            data-id="{{ $id }}"
                            style="width:40px;height:40px;">
                            {{ $asiento }}
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
        
        <div class="bg-secondary text-white text-center py-2 rounded mt-4 mx-auto" style="max-width: 500px;">
            PANTALLA
        </div>
        
        <form method="POST" action="{{ route('confirmacion.compra') }}" class="text-center mt-4">
            @csrf
            <input type="hidden" name="butacas" id="butacasInput">
            <input type="hidden" name="sesion_id" value="{{ $sesion->id }}">
            <button class="btn btn-primary px-5">
                Reservar
            </button>
        </form>
    </div>
</div>

<script>
let seleccionadas = [];

document.querySelectorAll('.seat').forEach(btn => {
    btn.addEventListener('click', () => {
        if (btn.classList.contains('disabled')) return;
        const id = btn.dataset.id;
        if (seleccionadas.includes(id)) {
            seleccionadas = seleccionadas.filter(x => x !== id);
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-success');
        } else {
            seleccionadas.push(id);
            btn.classList.remove('btn-success');
            btn.classList.add('btn-primary');
        }
        document.getElementById('butacasInput').value = seleccionadas.join(',');
    });
});
</script>

@include('footer')