@include('header')
<div class="container py-5 text-white">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Contacto</h1>
    </div>
    <div class="row justify-content-center g-4">
        {{-- QUIÉNES SOMOS --}}
        <div class="col-md-6">
            <div class="bg-dark rounded shadow p-4 h-100">
                <h3 class="text-warning mb-3">Quiénes somos</h3>
                <p>
                    Somos el equipo de desarrollo de <strong>CentralCines</strong>, un proyecto de Tecnologías web
                    donde se pone a prueba nuestros conociemientos para crear una pagina web de manera semiprofesional
                </p>
                <p>
                    El sistema que hemos hecho permite a los usuarios consultar películas, seleccionar asientos y 
                    gestionar sus entradas de forma sencilla y visual.
                </p>
                <hr class="border-secondary">
                <h5 class="text-light">Proyecto académico</h5>
                <p class="text-secondary mb-0">
                    Desarrollado como práctica de desarrollo web con Laravel y Bootstrap.
                </p>
            </div>
        </div>
        {{-- GITHUB --}}
        <div class="col-md-6">
            <div class="bg-dark rounded shadow p-4 h-100 text-center">
                <h3 class="text-warning mb-3">
                    Repositorio
                </h3>
                <p>
                    Accede al código fuente del proyecto CentralCines en GitHub.
                </p>

                <a href="https://github.com/gabrielherreraloz/CentralCines "target="_blank" class="btn btn-outline-light btn-lg mt-3">
                    Ver en GitHub
                </a>
                <hr class="border-secondary my-4">
                <h3 class="text-warning mb-3">
                    Contáctanos
                </h3>
                <p class="small">
                    mariaremacho@correo.ugr.es
                </p>
                <p class="small">
                    gabrielherrera@correo.ugr.es
                </p>
                <p class="small">
                    eladio106@correo.ugr.es
                </p>
            </div>
        </div>
    </div>
</div>
@include('footer')

