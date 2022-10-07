<main class="page lanidng-page">

    <section class="portfolio-block block-intro">
        <section class="newsletter-subscribe py-4 py-xl-5">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2 class="display-6 fw-bold">Condguard seguridad garantizada</h2>
                        <p class="text-muted">Condguard es una aplicación móvil disponible tanto para Android como para
                            IOS que le asegura a usted y a su familia una vida condominal segura y tranquila con
                            servicios eficientes.</p>
                    </div>
                    <center>
                        <hr>
                        <?php if (!isset($_SESSION['usuario'])) {
                        ?>
                        <a class="alert-link fs-5 me-2 py-2 px-4" data-bss-hover-animate="pulse"
                            href="<?= base_url('login') ?>" style="border-radius: 8px; padding-left: 11px">Iniciar
                            Sesión</a>
                        <?php } ?>
                    </center>
                </div>
            </div>
        </section>
    </section>
    <section class="portfolio-block photography">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image"
                            src="assets/img/nature/34693668_1804741769639426_1088002708855586816_n.jpg"></a></div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image"
                            src="assets/img/nature/28424787_1699509546829316_5920860520548473929_o.jpg"></a></div>
                <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image"
                            src="assets/img/tech/53891087_2205525606227705_4477630953723789312_n.jpg"></a></div>
            </div>
        </div>
    </section>
    <section class="portfolio-block call-to-action border-bottom">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center content">
                <h3>Reserve las áreas verdes de su preferencia con CondGuard.</h3>
            </div>
        </div>
    </section>
    <br><br><br><br><br>
    <section class="portfolio-block skills" style="margin-top: -88px;">
        <div class="container">
            <div class="heading">
                <h2>¿Qué ofrece condguard?</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-leaf"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Reservaciones de áreas verdes</h3>
                            <p class="card-text">Condguard permite que sus usuarios reserven las áreas verdes del
                                condominio, según los días y horas de su conveniencia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-ios-reverse-camera"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Reconocimiento de placas y cédulas</h3>
                            <p class="card-text">Condguard es capaz de aplicar reconocimiento de placas e
                                identificaciones, con el fin de fortalecer la seguridad de su hogar y agilizar los
                                procesos de seguridad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card special-skill-item border-0">
                        <div class="card-header bg-transparent border-0"><i class="icon ion-ios-paper"></i></div>
                        <div class="card-body">
                            <h3 class="card-title">Asambleas</h3>
                            <p class="card-text">Condguard permite capturar los votos durante las asambleas
                                condominales, brindándole seguridad y transparencia en la toma de decisiones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>