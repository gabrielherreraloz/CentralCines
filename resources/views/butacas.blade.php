@include('header')

<div class="container py-4 text-white">
    <h2>Butacas de la sesión {{ $sesion->id }}</h2>

    <div class="row">
        @foreach($butacas as $butaca)
            <div class="col-md-2">
                <div class="card mb-2 text-center">
                    <div class="card-body">
                        Butaca {{ $butaca->numero }}

                        @if($butaca->ocupada)
                            <span class="text-danger">Ocupada</span>
                        @else
                            <span class="text-success">Libre</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('footer')
