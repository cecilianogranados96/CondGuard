<div class="container d-flex justify-content-center"
    style="margin-top: 4%; margin-bottom: 4%; padding-bottom:60px;padding-top: 20px">
    <div class="col-md-5 col-xl-3">
        <div class="card mb-5 card-body d-flex flex-column align-items-center">
            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person"
                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                    </path>
                </svg></div>
            <form action="<?= base_url('login/signin') ?>" method="post"
                class="row g-3 text-center form-floating needs-validation" novalidate>
                <!-- title -->
                <h2>
                    Inicio de sesión
                </h2>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Correo electrónico"
                        data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Correo electrónico ej: nombre@mail.com"
                        value="<?= isset($item) ? $item['email'] : ''; ?>" required="" />
                    <label for="email">Correo electrónico </label>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar un correo electrónico valido, ej:nombre@mail.com.
                    </div>
                </div>
                <!-- input -->
                <div class="form-floating">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña"
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Ingrese su contraseña."
                        value="<?= isset($item) ? $item['password'] : ''; ?>" required="" />
                    <label for="password">Contraseña </label>
                    <div class="invalid-feedback">
                        Invalido, debe ingresar su contraseña.
                    </div>
                </div>
                <div class="required-feedback" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <!-- submit -->
                <div style="margin-top: 10%"><input class="btn btn-primary btn-lg bg-primary" style="width:100%"
                        type="submit" value="Iniciar Sesión" data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Iniciar Sesión" />
                    <br><br>
                    <a class="card-link" href="#">Olvido su contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</div>