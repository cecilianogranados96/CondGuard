<?php
$conn = new mysqli("sl4.cyberfuel.com", "CRM", "Btcr3519*", "CRM");
$conn_condo = new mysqli("synappcr.com", 'practica', 'v5$GkC77Ry', 'Condguard');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($conn_condo->connect_error) {
  die("Connection failed: " . $conn_condo->connect_error);
}


$conn->set_charset("utf8");
$conn_condo->set_charset("utf8");

////////////////////////////////////////////////////////////////////////////////////////////////

$result = $conn_condo->query("DELETE FROM `condo_owner`");
$sql = "SELECT tblclients.userid, tblclients.company,tblclients.vat, CONCAT(tblcontacts.firstname,' ',tblcontacts.lastname) as name,tblcontacts.email,tblcontacts.phonenumber, (SELECT count(*) as total FROM `tblinvoices` WHERE `clientid` = tblclients.userid and status != 2) as facturas FROM `tblclients`, tblcontacts WHERE tblclients.userid = tblcontacts.userid and tblcontacts.is_primary = 1; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["facturas"] >= 4) {
      $payment = 0;
    } else {
      $payment = 1;
    }
    $sql = "INSERT INTO `condo_owner`(`condo_owner_id`, `identity`, `name`, `email`, `phone`, `land_number`,payment) VALUES (
          '" . $row["userid"] . "',
          '" . $row["vat"] . "',
          '" . $row["name"] . "',
          '" . $row["email"] . "',
          '" . $row["phonenumber"] . "',
          '" . $row["company"] . "',
          '" . $payment . "'
        );";
    //echo $sql ."<br>";
    $conn_condo->query($sql);
  }
} else {
  echo "0 results";
}

////////////////////////////////////////////////////////////////////////////////////////////////
$result = $conn_condo->query("DELETE FROM `authorized`");

$sql = "SELECT tblcontacts.id, tblclients.userid,tblcontacts.title, tblclients.company,tblclients.vat, CONCAT(tblcontacts.firstname,' ',tblcontacts.lastname) as name,tblcontacts.email,tblcontacts.title,tblcontacts.phonenumber FROM `tblclients`, tblcontacts WHERE tblclients.userid = tblcontacts.userid and tblcontacts.is_primary = 0; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sql = "INSERT INTO `authorized`(`authorized_id`, `condo_owner_id`, `name`, `reason`, `phone`)  VALUES (
          '" . $row["id"] . "',
          '" . $row["userid"] . "',
          '" . $row["name"] . "',
          '" . $row["title"] . "',
          '" . $row["phonenumber"] . "'
        );";
    $conn_condo->query($sql);
  }
} else {
  echo "0 results";
}

////////////////////////////////////////////////////////////////////////////////////////////////
$result = $conn_condo->query("DELETE FROM `relative`");

$sql = "SELECT bitacora.id_bitacora,bitacora.cedula,bitacora.nombre,bitacora.placa,bitacora.entrada,bitacora.salida,tblclients.userid FROM bitacora, tblclients WHERE tblclients.company = bitacora.filial ORDER BY `bitacora`.`entrada` DESC limit 2500;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sql = "INSERT INTO `relative`(`relative_id`, `condo_owner_id`, `identity`, `name`, `phone`) VALUES (
          '" . $row["id_bitacora"] . "',
          '" . $row["userid"] . "',
          '" . $row["cedula"] . "',
          '" . $row["nombre"] . "',
          ''
        );";
    //echo $sql."<br>";
    $conn_condo->query($sql);
  }
} else {
  echo "0 results";
}
$conn->close();