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
                        <?php if (session()->get('isLoggedIn') != true) {
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
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/condo/image4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/condo/image5.jpg" class="d-block w-100" alt="...">

                <div class="carousel-caption d-none d-md-block fs-5 fw-bold text-primary">
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/condo/image6.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="heading text-center">
        <h2>¿Qué ofrece condguard?</h2>
    </div>
    <section class="text-center  features-icons">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-screen-desktop m-auto text-primary"></i>
                        </div>
                        <h3>Reservaciones de áreas verdes</h3>
                        <p class="lead mb-0">Condguard permite que sus usuarios reserven las áreas verdes del
                            condominio, según los días y horas de su conveniencia.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-layers m-auto text-primary"></i></div>
                        <h3>Reconocimiento de placas y cédulas</h3>
                        <p class="lead mb-0">Condguard es capaz de aplicar reconocimiento de placas e
                            identificaciones, con el fin de fortalecer la seguridad de su hogar y agilizar los
                            procesos de seguridad.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-check m-auto text-primary"></i></div>
                        <h3>Asambleas</h3>
                        <p class="lead mb-0">Condguard permite capturar los votos durante las asambleas
                            condominales, brindándole seguridad y transparencia en la toma de decisiones.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>