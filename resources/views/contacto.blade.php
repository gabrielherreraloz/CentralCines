@include('header')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-dark text-white text-center">
                    <h3>Contacto</h3>
                </div>

                <div class="card-body p-4">

                    <form method="POST" action="/contacto">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mensaje</label>
                            <textarea name="mensaje" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-outline-secondary">
                                Limpiar
                            </button>

                            <button type="submit" class="btn btn-danger">
                                Enviar mensaje
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@include('footer')
