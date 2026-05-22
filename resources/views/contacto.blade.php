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
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" id="input-nombre" placeholder=" " class="form-control" required>
                            <label for="input-nombre">
                                Nombre
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="apellidos" id="input-apellidos" placeholder=" " class="form-control" required>
                            <label for="input-apellidos">
                                Apellidos
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="input-email" placeholder=" " class="form-control" required>
                            <label for="input-email">
                                Email
                            </label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="mensaje" id="input-mensaje" placeholder=" " class="form-control" rows="5" required></textarea>
                            <label for="input-mensaje">
                                Mensaje
                            </label>
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
