<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Central Cines
        </title>
        <link rel="icon" type="image/x-icon" href="{{ asset('https://cdn-icons-png.flaticon.com/512/860/860158.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
        <style>
            @keyframes desvanecerAlerta {
                0% { opacity: 1; visibility: visible; }
                80% { opacity: 1; visibility: visible; }
                100% { opacity: 0; visibility: hidden; pointer-events: none; }
            }
            .alerta-temporal {
                animation: desvanecerAlerta 5s forwards;
            }
            body {
                background-image: url("{{ asset('../assets/fondo.png') }}");
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
                min-height: 100vh;
                min-width: 320px;
                overflow-x: hidden;
            }
            .logo-header {
                max-height: 100px;
                width: auto;
            }
        </style>
    </head>
    <body>
        @if ($errors->any())
            <div class="alert alert-danger position-fixed top-0 end-0 m-4 shadow-lg alerta-temporal" role="alert" style="z-index: 1050; max-width: 350px;">
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success position-fixed top-0 end-0 m-4 shadow-lg alerta-temporal" role="alert" style="z-index: 1050; max-width: 350px;">
                <div class="mb-0 mt-1">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="text-center d-flex flex-column min-vh-100">
            <header class="bg-dark py-3">
                <img src="{{ asset('../assets/logotipo.png') }}" alt="Logo Central Cines" class="logo-header">

                @if(isset($_COOKIE['usuario']))
                    <div class="alert alert-info mt-2" role="alert">
                        (COOKIE) Usuario: {{ htmlspecialchars($_COOKIE['usuario']) }}
                    </div>
                @endif
            </header>
                
            <!-- Menu Superior -->
            <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('.') }}">Cartelera</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contacto')}}">Contacto</a></li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <button class="btn btn-outline-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuPrivado">
                                    Bienvenido, {{ Auth::user()->nombre }}
                                </button>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#formLogin" data-bs-toggle="collapse" role="button">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#formRegistro" data-bs-toggle="collapse" role="button">Registrarse</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>

            <!-- Menu Lateral, solo se muestra si se ha inciado sesión -->
            @auth
                <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="menuPrivado" aria-labelledby="menuPrivadoLabel">
                    <div class="offcanvas-header border-bottom border-secondary">
                        <h5 class="offcanvas-title" id="menuPrivadoLabel">Panel de Usuario</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    
                    <div class="offcanvas-body d-flex flex-column">
                        <div class="list-group list-group-flush mb-auto">
                            <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action bg-dark text-white border-secondary">
                                <i class="bi bi-person"></i> Mi Perfil
                            </a>
                            
                            @if(Auth::user()->admin)
                            <a href="{{ url('/admin') }}" class="list-group-item list-group-item-action bg-dark text-warning border-secondary">
                                <i class="bi bi-shield-lock"></i> Administración
                            </a>
                            @endif
                            
                            <a href="{{ url('/mis-entradas') }}" class="list-group-item list-group-item-action bg-dark text-white border-secondary">
                                <i class="bi bi-ticket"></i> Mis Entradas
                            </a>
                        </div>
                        <div class="mt-4 border-top pt-3 border-secondary">
                            <form action="{{ route('usuario.cerrar_sesion') }}" method="POST" class="mt-4 border-top pt-3 border-secondary">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="container p-0" id="accesoUsuarios" style="max-width: 550px">
                <!-- menu inicio de sesion -->
                <div class="collapse" id="formLogin" data-bs-parent="#accesoUsuarios">
                    <div class="card card-body bg-dark text-white mb-3">
                        <form class="row g-3 justify-content-center" action="{{ route('usuario.iniciar_sesion') }}" method="POST">
                            @csrf
                            <div class="col-md-5">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-4">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- menu registro -->
                <div class="collapse" id="formRegistro" data-bs-parent="#accesoUsuarios">
                    <div class="card card-body bg-dark text-white ">
                        <form action="{{ route('usuario.registrar') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required minlength="6">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir Contraseña" required>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-success px-5">Crear Cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>