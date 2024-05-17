<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_pendaftaran";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

$nama = $_POST["username"];
$pw = $_POST['pw'];

$sql = "INSERT INTO tbl_anggota (username, kata_sandi) VALUES ('$nama', '$pw')";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $hasil = "Berhasil";
    // echo "Connected successfully";
    $query = mysqli_query($conn, $sql);
}
header("Location: ../form.html");

?>