<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (isset($_SESSION['dataSiswa'][$key])) {
        $siswa = $_SESSION['dataSiswa'][$key];
    }
}
// mengecek jika request method nya selain dari post maka kode tidak akan dijalankan sc:stackoverflow
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($key)) {
    // update data siswa
    $_SESSION['dataSiswa'][$key]['nama'] = $_POST['nama'];
    $_SESSION['dataSiswa'][$key]['nis'] = $_POST['nis'];
    $_SESSION['dataSiswa'][$key]['rayon'] = $_POST['rayon'];

    // kembali ke halaman index
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        a {
            text-decoration:none;
            background-color:cyan;
            padding-top:3px;
            padding-bottom:3px;
            padding-right:8px;
            padding-left:8px;
            border-radius:7px;
        
        }
        

        body{
            background-image: url("imagespb2.jpg");
        }

        .tengah{
            margin-top:17rem;
            background: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);

        opacity: 0.9;
            width:400px;
            margin-left:600px;
            border-radius:9px;
            padding-top:15px;
            padding-bottom:15px;
        }
    </style>
</head>
<body>
    <div class="tengah">
    <center>
    <form action="" method = "POST">
        
                                    <label for="nama">Nama:</label><br>
                                    <input type="text" id="nama" name="nama" class=""
                                        value="<?php echo $siswa['nama']; ?>"><br>
                                    <label for="nis">NIS:</label><br>
                                    <input type="text" id="nis" name="nis" value="<?php echo $siswa['nis']; ?>"><br>
                                    <label for="rayon">Rayon:</label><br>
                                    <input type="text" id="rayon" name="rayon"
                                        value="<?php echo $siswa['rayon']; ?>"><br>
                                        <br>

                                        <div>
                                        <input type="submit" value="Simpan">
                                    <a href="index.php">Kembali</a>
                                        </div>
                                        </form>
                                        </center>
                                        </div>
</body>
</html>