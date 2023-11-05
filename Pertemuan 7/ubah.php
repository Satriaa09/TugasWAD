<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "toko_laptop");

$id = $_GET["id"];
$laptop = query("SELECT * FROM laptop WHERE id=$id")[0];

if(isset($_POST["submit"])) {
    if(ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-info-subtle" style="height:100vh">
    <h1 class="text-center">UBAH DATA</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div style="display: flex; justify-content: end; margin-right:2em">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <button onclick="cancelFunc()" class="btn btn-primary" style="margin-left:1em">Cancel</button>
            <script>
                const cancelFunc = () => {
                    document.location.href = 'index.php';
                };
            </script>
        </div>
        <input type="hidden" name="id" value="<?= $laptop["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $laptop["gambar"]; ?>">
        <div class="mb-3">
            <label for="nomerseri" class="form-label">Nomor Seri:</label>
            <input type="text" name="nomerseri" class="form-control" id="nomerseri" value="<?= $laptop["nomerseri"] ?>">
        </div>
        <div class="mb-3">
            <label for="namalaptop" class="form-label">Nama Laptop:</label>
            <input type="text" name="namalaptop" class="form-control" id="namalaptop" value="<?= $laptop["namalaptop"] ?>">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model:</label>
            <input type="text" name="model" class="form-control" id="model" value="<?= $laptop["model"] ?>">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <input type="text" name="type" class="form-control" id="type" value="<?= $laptop["type"] ?>">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <br>
            <img src="img/<?= $laptop['gambar']; ?>" alt="" width="50">
            <br>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
