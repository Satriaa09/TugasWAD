<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "toko_laptop");

if (isset($_POST["submit"])) {

    // Check if data has been successfully added or not
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
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
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-info-subtle" style="height:100vh">
<h1 class="text-center">TAMBAH DATA</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div style="display: flex; justify-content: end; margin-right:2em">
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        <button onclick="cancelFunc()" class="btn btn-primary" style="margin-left:1em">Cancel</button>
        <script>
            const cancelFunc = () => {
                document.location.href = 'index.php';
            };
        </script>
    </div>
    <div class="mb-3">
        <label for="nomerseri" class="form-label">Nomor Seri:</label>
        <input type="text" name="nomerseri" class="form-control" id="nomerseri" required>
    </div>
    <div class="mb-3">
        <label for="namalaptop" class="form-label">Nama Laptop:</label>
        <input type="text" name="namalaptop" class="form-control" id="namalaptop" required>
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Model:</label>
        <input type="text" name="model" class="form-control" id="model" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Type:</label>
        <input type="text" name="type" class="form-control" id="type" required>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar:</label>
        <input type="file" name="gambar" id="gambar" class="form-control">
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
