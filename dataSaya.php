<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_pendaftaran";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk mengambil data dari tabel anggota
$sql = "SELECT username, kata_sandi FROM tbl_anggota";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <p id="demo"></p>
    <script>
        const tanggal = new Date();
        document.getElementById("demo").innerHTML = tanggal.new Date();
    </script>
    <?php
    date_default_timezone_set("Asia/jakarta");
    ?>
    <p style="text-align: center; font-size: 25px;">Pukul: <b><span id="jam"></span></b></p>

    <script type="text/javascript">
        window.onload = function () { jam(); }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
    <h2>Database</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Kata Sandi</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['username']}</td>
                        <td>{$row['kata_sandi']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>