@include('header')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-dark text-white text-center">
                    <h3>
                        Datos de usuario
                    </h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mx-4 mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <div>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success mx-4 mt-3">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-body p-3">
                    <form class="ms-4 me-4 mt-4" action="{{ route('actualizar_perfil') }}" method="post">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="input-nombre" name="nombre" placeholder=" " value="{{$usuario->nombre}}" required>
                            <label class="" for="input-nombre">
                                Nombre
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="input-apellidos" name="apellidos" placeholder=" " value="{{$usuario->apellidos}}"required>
                            <label for="input-apellidos">
                                Apellidos
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="input-email" name="email" placeholder=" " value="{{$usuario->email}}" required>
                            <label for="input-email">
                                Correo Electrónico
                            </label>
                        </div>
                        <div class="text-black mb-4 text-start">
                            Cambiar contraseña
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="input-contraseña_actual" name="contraseña_actual" placeholder=" ">
                            <label for="input-contraseña_actual">
                                Contraseña actual
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="input-contraseña_nueva" name="contraseña_nueva" placeholder=" ">
                            <label for="input-contraseña_nueva">
                                Nueva contraseña
                            </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="input-contraseña_nueva_2" name="contraseña_nueva_2" placeholder=" ">
                            <label for="input-contraseña_nueva_2">
                                Repetir nueva contraseña
                            </label>
                        </div>
                        <div class="d-flex-mb justify-content-center">
                            <input type="submit" class="btn btn-primary col-12 col-md-3 me-2 mb-2" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')