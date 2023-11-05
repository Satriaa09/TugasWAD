<?php
//koneksi ke database
require 'functions.php';

$mahasiswa = query("SELECT * FROM laptop");

//tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="p-3 mb-2 bg-info-subtle text-emphasis-info" style="height:100vh">

    <h1 class="text-center">DAFTAR LAPTOP</h1>
    <a class="btn btn-primary ms-4" href="tambah.php" role="button">Tambah Data</a>

    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="41" autofocus placeholder="Keyword Pencarian" autocomplete="off">
        <button class="btn btn-primary ms-3" type="submit" name="cari">CARI</button>

    </form>

    <br>

    <table class="table table-striped" border="1">

        <tr class="table-info">
            <th class="text-center">No.</th>
            <th class="text-center">Aksi</th>
            <th class="text-center">Gambar</th>
            <th class="text-center">Nomor Seri</th>
            <th class="text-center">Nama Laptop</th>
            <th class="text-center">Model</th>
            <th class="text-center">Type</th>
        </tr>

        <?php $i = 1; ?>
        <?php if ($mahasiswa) : ?> 
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td class="text-center"><?= $i; ?></td>
                    <td class="text-center">
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                    </td>
                    <td class="text-center"><img src="img/<?= $row["gambar"]; ?>" width="150" alt=""></td>
                    <td class="text-center"><?= $row["nomerseri"]; ?> </td>
                    <td class="text-center"><?= $row["namalaptop"]; ?></td>
                    <td class="text-center"><?= $row["model"]; ?></td>
                    <td class="text-center"><?= $row["type"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Data tidak ditemukan.</td>
            </tr>
        <?php endif; ?>
    </table>
    <link href="https://cdn.jsdelivr.net/npm bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</div>
</body>
</html>