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
            body {
                background-image: url("{{ asset('../assets/fondo.png') }}");
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
                min-height: 100vh;
            }
            .logo-header {
                max-height: 100px;
                width: auto;
            }
        </style>

      </head>
    <body>
        <div class="contaire text-center">
          <header class="bg-dark py-3">
                <img src="{{ asset('../assets/logotipo.png') }}" alt="Logo Central Cines" class="logo-header">

                @if(isset($_COOKIE['usuario']))
                    <div class="alert alert-info mt-2" role="alert">
                        (COOKIE) Usuario: {{ htmlspecialchars($_COOKIE['usuario']) }}
                    </div>
                @endif
            </header>
            
            <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('') }}">Cartelera</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/PONERAQUIENLACE') }}">Contacto</a></li>
                        @if(isset($usuario) && $usuario->es_admin)
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="{{ url('/admin') }}">Administración</a>
                        </li>
                        @endif
                    </ul>

                    <ul class="navbar-nav ms-auto">
                      @if(isset($usuario))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/perfil') }}">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ url('/logout') }}">Salir</a>
                        </li>
                      @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light btn-sm ms-lg-2 px-3" href="{{ url('/registro') }}">Registro</a>
                        </li>
                      @endif
                    </ul>
                </div>
            </nav>

            <div class="container p-0">
              <div class="collapse" id="formLogin" data-bs-parent=".container">
                  <div class="card card-body bg-dark text-white border-top-0">
                      <form action="{{ url('/login') }}" method="POST" class="row g-3 justify-content-center">
                          @csrf
                          <div class="col-md-4">
                              <input type="email" name="email" class="form-control" placeholder="Email" required>
                          </div>
                          <div class="col-md-4">
                              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                          </div>
                          <div class="col-md-2">
                              <button type="submit" class="btn btn-primary w-100">Acceder</button>
                          </div>
                      </form>
                  </div>
              </div>

              <div class="collapse" id="formRegistro" data-bs-parent=".container">
                  <div class="card card-body bg-dark text-white border-top-0 rounded-bottom">
                      <form action="{{ url('/registro') }}" method="POST" class="row g-3">
                          @csrf
                          <div class="col-md-6">
                              <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                          </div>
                          <div class="col-md-6">
                              <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                          </div>
                          <div class="col-md-6">
                              <input type="email" name="email" class="form-control" placeholder="Email" required>
                          </div>
                          <div class="col-md-6">
                              <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" required>
                          </div>
                          <div class="col-12 text-center">
                              <button type="submit" class="btn btn-success px-5">Crear Cuenta</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>