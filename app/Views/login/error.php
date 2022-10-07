<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="padding: 40px 15px; text-align: center;">
                <h1>
                    Oops!
                </h1>
                <h2 style="color:red">
                    <?= $error_message ?>
                </h2>
                <div>
                    Lo sentimos, intente de nuevo.
                </div>
                <div style="margin-top: 15px; margin-bottom: 15px;">
                    <a class="btn btn-primary fs-5 me-2 py-2 px-4" data-bss-hover-animate="pulse"
                        href="<?= base_url('login') ?>" style="border-radius: 8px; padding-left: 11px">Iniciar
                        Sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>