<div class="container my-auto">
    <!-- title -->
    <h1 class="text-center pt-3">
        Ingreso a filial <?= $_GET["land_number"] ?> <a name="" id="" class="" onclick="info()" href="#"
            role="button"><i class="fas fa-info-circle"></i></a>
    </h1>
    <hr>
    <!--DATA TABLE-->
    <div class="table-responsive inline-block">
        <div class="row mb-3">
            <div class="col">
                <form action="<?= base_url('security/save') ?>" method="post">
                    <!-- hidden input -->
                    <input name="identity" type="hidden"
                        value="<?= isset($_GET["identity"]) ? $_GET["identity"] : '' ?>">
                    <!-- hidden input -->
                    <input name="name" type="hidden" value="<?= isset($_GET["name"]) ? $_GET["name"] : '' ?>">
                    <!-- hidden input -->
                    <input name="vehicle_plate" type="hidden"
                        value="<?= isset($_GET["vehicle_plate"]) ? $_GET["vehicle_plate"] : '' ?>">
                    <!-- hidden input -->
                    <input name="vehicle_plate" type="hidden"
                        value="<?= isset($_GET["vehicle_plate"]) ? $_GET["vehicle_plate"] : '' ?>">
                    <!-- hidden input -->
                    <input name="land_number" type="hidden"
                        value="<?= isset($_GET["land_number"]) ? $_GET["land_number"] : '' ?>">
                    <!-- hidden input -->
                    <input name="phone" type="hidden" value="<?= isset($_GET["phone"]) ? $_GET["phone"] : '' ?>">
                    <button type="submit" class="btn btn-success w-100" role="button" data-bs-toggle="tooltip"
                        title="Marcar Entrada" style="height: 45px;">Permitir entrada</button>
                </form>
            </div>
            <div class="col">
                <a href="<?= base_url('entries') ?>" class=" btn btn-danger w-100" role="button"
                    data-bs-toggle="tooltip" title="Rechazar entrada" style="height: 45px;">
                    Rechazar entrada <i class="fas fa-times-circle"></i></a>
            </div>
        </div>

        <iframe id="inlineFrameExample" class="rounded border-info "
            title="Instrucción: envíe una notificación de confirmación a los miembros en la lista mas abajo, al confirmarse la entrada el recuadro se mostrara en verde de lo contrario se mostrara en rojo, según lo requiera puede llamar a los miembros en la lista mas abajo para confirmar la entrada de forma manual."
            width="100%" data-bs-toggle="tooltip" title="Marcar Entrada" height="110" scrolling="no"
            src="https://api.synappcr.com/condoguard/alert/?tel=506">
        </iframe>

        <h2 class="Contactos">Contactos <a name="" id="" class="" onclick="info()" href="#" role="button"><i
                    class="fas fa-info-circle"></i></a></h2>
        <table id="datatable" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Razón</th>
                    <th>Contacto Whatsapp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $condo_owner['identity'] ?></td>
                    <td><?= $condo_owner['name'] ?></td>
                    <td>PROPIETARIO(A)</td>
                    <td>
                        <a href="tel:<?= $condo_owner['phone'] ?>" data-bs-toggle="tooltip" title="Contactar"
                            class="btn btn-success"><?= $condo_owner['phone'] ?> <i class="fas fa-phone-alt"></i></a>
                    </td>
                </tr>
                <?php foreach ($items as $item) : ?>
                <tr>

                    <td><?= $item['identity'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['reason'] ?></td>
                    <td>
                        <?php if ($item['phone'] != '') { ?>
                        <a onclick="permission(<?= str_replace('-', '', $item['phone']) ?>)" data-bs-toggle="tooltip"
                            title="Contactar" class="btn btn-success"><?= $item['phone'] ?> <i
                                class="fas fa-phone-alt"></i></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$phone = '8350-0664';
$phone = str_replace('-', '', $phone);
?>


<a onclick="permission2(<?= $phone ?>)" data-bs-toggle="tooltip" title="Llamar"
    class="btn btn-success w-25 visually-hidden">Test <i class="fas fa-phone-alt"></i></a>
<script>
//send whatsapp notification 
function permission(phone) {
    loadIframe('inlineFrameExample', 'https://api.synappcr.com/condoguard/alert/?tel=506' + phone);
    $.post(
        "https://api.synappcr.com/condoguard/send/?telefono=506" + phone +
        "&nombre=<?= $_GET["name"] ?><?= $_GET["reason"] == ', por motivo de' ? '' : $_GET["reason"]; ?>&identificacion=<?= $_GET["identity"] ?>&lang=es_ES", {}
    )
}
//Change iframe src
function loadIframe(iframeName, url) {
    var $iframe = $('#' + iframeName);
    if ($iframe.length) {
        $iframe.attr('src', url);
        return false;
    }
    return true;
}
//Sweetalert with instructions
function info() {
    Swal.fire({
        timer: 1250,
        icon: 'info',
        title: 'Ayuda',
        text: 'Instrucción: envíe una notificación de confirmación a los miembros en la lista mas abajo, al confirmarse la entrada el recuadro se mostrara en verde de lo contrario se mostrara en rojo, según lo requiera puede llamar a los miembros en la lista mas abajo para confirmar la entrada de forma manual.',
        showCloseButton: true,
        showConfirmButton: false
    })
}


function permission2(phone) {
    loadIframe('inlineFrameExample', 'https://api.synappcr.com/condoguard/alert/?tel=506' + phone);
    $.post(
        "https://api.synappcr.com/condoguard/send/?telefono=506" + phone +
        "&nombre=<?= $_GET["name"] ?><?= $_GET["reason"] == ', por motivo de' ? '' : $_GET["reason"]; ?>&identificacion=<?= $_GET["identity"] ?>&lang=es_ES", {}
    )
}
</script>