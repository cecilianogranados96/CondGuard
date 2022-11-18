</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<footer class="sticky-footer bg-white mt-auto w-100">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © <?= date("Y"); ?> CondGuard</span>
        </div>
    </div>
</footer>

<!--NAV-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!--BOOTSTRAP 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<!--DATATABLE-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sb-1.3.4/datatables.min.js">
</script>

<!--SELECT2 with BOOTSTRAP 5-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--Language for select2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/i18n/es.js"></script>

<!--Sweetalert2-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>

<!--CUSTOM-->
<script type="text/javascript" src="<?= base_url('assets/js/bs-init.js') ?>"></script>


<script>
//Sidebar
$(document).ready(function() {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function() {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

//Sweetalert2 
$(function() {
    <?php if (session()->has("message_icon")) { ?>
    Swal.fire({
        timer: 950,
        icon: '<?= session("message_icon") ?>',
        title: '<?= session("message") ?>',
        showConfirmButton: false
    })
    <?php } ?>
});




//Enable BS5 popovers
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

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
$('.single-select-clear-field').select2({
    theme: "bootstrap-5",
    width: '100%',
    placeholder: $(this).data('placeholder'),
    allowClear: true
});

//Datatables options
$(document).ready(function() {
    var table = $('#datatable').DataTable({
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
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        // dom: '<"dt-top-container"<l><"dt-center-in-div"B><f>r>t<"dt-filter-spacer"f><ip>',
        dom: "<'row'<'col-sm-12 col-md-5'B><'col-sm-12 col-md-3'l><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [{
            extend: 'pdf',
            split: ['csv', 'excel', 'print'],
        }]


    });
    table.buttons().container()
        .appendTo($('.col-sm-6:eq(0)', table.table().container()));

});
</script>



<script type="text/javascript">

</script>


</body>

</html>