

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © <?=date("Y");?> CondGuard</span>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sc-2.0.7/sb-1.3.4/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bs-init.js') ?>"></script>
    <script>
    $('.single-select-clear-field').select2({
        theme: "bootstrap-5",
        width: '100%',
        placeholder: $(this).data('placeholder'),
        allowClear: true
    });
    //Datatables options
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            }

        });
    });
    </script>
</body>
</html>