<!--Footer-->
<footer class="text-center bg-dark mt-auto" style="padding-bottom: 5%;">
    <!--style="position: fixed;bottom: 0px;width: 100%;left:0px"-->
    <div class="container text-white py-4 py-lg-5">
        <ul class="list-inline">
            <li class="list-inline-item me-4"><a class="link-light" href="<?= base_url() ?>">Inicio</a></li>
            <li class="list-inline-item me-4"><a class="link-light" href="#">Reserva</a></li>
            <li class="list-inline-item"><a class="link-light" href="#">Nosotros</a></li>
        </ul>
        <br>
        <p class="text-muted mb-0">Copyright © 2022 CondGuard</p>
    </div>
</footer>



<!-- Scripts import-->
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sc-2.0.7/sb-1.3.4/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts custom import-->
<script type="text/javascript" src="<?= base_url('assets/js/bs-init.js') ?>"></script>

<!-- Scripts custom-->
<script>
//Enable BS5 Tooltips
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

//Hide required message when input
$('input').change(function() {
    if (this.value) {
        $('.required-feedback').hide();
    } else {
        $('.required-feedback').show();
    }
});

//only numbers typing on certain inputs
$('.only-number').on('change keyup', function() {
    // Remove invalid characters
    var sanitized = $(this).val().replace(/[^-.0-9]/g, '');
    // Remove non-leading minus signs
    sanitized = sanitized.replace(/(.)-+/g, '$1');
    // Remove the first point if there is more than one
    sanitized = sanitized.replace(/\.(?=.*\.)/g, '');
    // Update value
    $(this).val(sanitized);
});
//only alpha-numberic typing on certain inputs
$('.only-alphanumeric').on('change keyup', function() {
    // Remove invalid characters
    var sanitized = $(this).val().replace(/[^-A-z0-9]/g, '');
    // Remove non-leading minus signs
    sanitized = sanitized.replace(/(.)-+/g, '$1');
    // Remove the first point if there is more than one
    sanitized = sanitized.replace(/\.(?=.*\.)/g, '');
    // Update value
    $(this).val(sanitized);
});

//Enable BS5 form validation (JavaScript for disabling form submissions if there are invalid fields)
(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            'submit',
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            },
            false
        );
    });
})();
//Enable Select2 with bootstrap 5 
/*$('.single-select-clear-field').select2({
    theme: "bootstrap-5",
    width: '100%',
    placeholder: $(this).data('placeholder'),
    allowClear: true
});*/
//Datatables options
$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: {
            breakpoints: [{
                    name: 'bigdesktop',
                    width: Infinity
                },
                {
                    name: 'meddesktop',
                    width: 1480
                },
                {
                    name: 'smalldesktop',
                    width: 1280
                },
                {
                    name: 'medium',
                    width: 1188
                },
                {
                    name: 'tabletl',
                    width: 1024
                },
                {
                    name: 'btwtabllandp',
                    width: 848
                },
                {
                    name: 'tabletp',
                    width: 768
                },
                {
                    name: 'mobilel',
                    width: 480
                },
                {
                    name: 'mobilep',
                    width: 320
                }
            ]
        }

        ,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }

    });
});
</script>
</body>

</html>