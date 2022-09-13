<?php
$dbhost = "localhost:3306";
$dbuser = "practica";
$dbpass = 'v5$GkC77Ry';
$dbname = "Condguard";
$dbport = 3306;
$conn =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);
if ($conn->connect_error) {
    die("Error connecting to database");
}
mysqli_select_db($conn, "Condguard");
$sql_query = "SELECT * FROM Officer";
$result = mysqli_query($conn, $sql_query);

$num_rows = mysqli_num_rows($result);
$num_fields = mysqli_num_fields($result);
print_r(mysqli_fetch_field_direct($result, 3));
echo "<table border='1'>";
echo "<tr>";
for ($j = 0; $j < $num_fields; $j++) {
    echo "<td>" . mysqli_fetch_field_direct($result, $j)->name . "</td>";
}
echo "</tr>";
for ($i = 0; $i < $num_rows; $i++) {
    $row = mysqli_fetch_row($result);
    echo "<tr>";
    for ($j = 0; $j < $num_fields; $j++) {
        echo "<td>" . $row[$j] . "</td>";
    }
    echo "<tr/>";
}
echo "</table>";
mysqli_free_result($result);
mysqli_close($conn);