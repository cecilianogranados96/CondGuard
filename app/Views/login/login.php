<div class="bg-gradient-primary" style="height:100vh; ">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>


                                    <form action="<?= base_url('login/signin') ?>" method="post"
                                        class="user row g-2 needs-validation" novalidate>

                                        <!-- input -->
                                        <div class="form-floating">
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="Correo electrónico" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Correo electrónico ej: nombre@mail.com"
                                                value="<?= isset($item) ? $item['email'] : ''; ?>" required=""
                                                style="border-radius: 100px;" />
                                            <label for="email">Correo electrónico </label>
                                            <div class="invalid-feedback">
                                                Invalido, debe ingresar un correo electrónico valido,
                                                ej:nombre@mail.com.
                                            </div>
                                        </div>
                                        <!-- input -->
                                        <div class="form-floating">
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="Contraseña" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Ingrese su contraseña."
                                                value="<?= isset($item) ? $item['password'] : ''; ?>" required=""
                                                style="border-radius: 100px;" />
                                            <label for="password">Contraseña </label>
                                            <div class="invalid-feedback">
                                                Invalido, debe ingresar su contraseña.
                                            </div>
                                        </div>

                                        <div>
                                            <input class="btn btn-primary btn-user btn-block my-4"
                                                style="width:100%;border-radius: 100px;" type="submit"
                                                value="Iniciar Sesión" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Iniciar Sesión" />
                                        </div>

                                        <hr>

                                    </form>
                                    <!-- Error -->
                                    <?php if (session()->getFlashdata('error') != '') { ?>
                                    <div class="form-floating required-feedback mt-3">
                                        <div class="alert alert-warning d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle mr-3"></i>
                                            <div style="color: black;">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <br><br>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>