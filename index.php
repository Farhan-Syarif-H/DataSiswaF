<?php 
session_start();
// isialisasi array kosong 
if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if (isset($_POST["tambah"])) {
    if ($_POST['nama'] == "" && $_POST['nis'] == "" && $_POST['rayon'] == "") {
        echo "data kosong <br>";
    } else {
        $siswa = array(
            "nama"  => $_POST ['nama'],
            "nis"   => $_POST ['nis'],
            "rayon" => $_POST ['rayon']
        );
        array_push($_SESSION['dataSiswa'], $siswa);
    }
}

// hapus data dari session
if (isset($_GET['hapus'])) {
    $key = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$key]);

    header('location: ' . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    <div class="image">
        <img src="imagespb.jpg" alt="">
        <h1>Farhan Syarif Hidayatulloh</h1>
    </div>
    <center>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    a {
        text-decoration: none;
        color: black;
    }
    body {
        background-color:wheat;
    }
.output{
    background-color:white;
    width: 400px;
    border-radius:6px;
    box-shadow: 2px 2px 2px 0px; 
}

H1 {
    background-color:white;
    width:250px;
    border-radius:6px;
    box-shadow: 2px 2px 2px 0px; 
}
.image img {
    width:130px;
    height:130px;
    border-radius:50%;
    margin-left:4rem;
}

.image h1{
    text-align:center;
}

.hapus {
    color:red;
}

.edit {
    color:green;
}

.tengah{
    background-color:white;
    width:400px;
    box-shadow: 2px 2px 2px 0px; 
    margin-bottom:1rem;
}




</style>

    <h1>DATA SISWA</h1>
    <div class ="tengah">
    <form action="" method = "POST">
    <label for="nama">Nama : </label><br>

    <input type="text" name="nama" id = "nama" required><br>

    <label for="nis">Nis : </label><br>

    <input type="number" name="nis" id="nis" required><br>

    <label for="rayon">Rayon : </label><br>

    <input type="text" name="rayon" id="rayon" required><br>

    <div>
        <button name = "tambah">Tambah</button>
        <button name= "reser"><a href="destroy.php">Reset</a></button>
        <br></br>
    </div>

    </form>
    </div>

<div class="output">
    <?php
                            if (!empty($_SESSION['dataSiswa'])) {
                                foreach ($_SESSION['dataSiswa'] as $key => $value) {
                                    $nama = $value["nama"];
                                    $nis = $value["nis"];
                                    $rayon = $value["rayon"];
                                    echo ucwords("<br><h4> $nama | $nis | $rayon</h4>");
                                    echo "<a href='?hapus=" . $key . "' class=\"hapus\"><i class='hapus'></i> Hapus </a>";
                                    echo "<a href='edit.php?key=" . $key . "' class=\"edit\"><i class='bx bx-pencil'></i>    Edit</a><br>";
                                    echo "<br>";
                                }
                            }
                            ?>
                            </div>
</body>
</center>
</html>