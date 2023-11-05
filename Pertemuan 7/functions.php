<?php
//koneksi database
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "toko_laptop");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nomerseri = htmlspecialchars($data["nomerseri"]);
    $namalaptop = htmlspecialchars($data["namalaptop"]);
    $model = htmlspecialchars($data["model"]);
    $type = htmlspecialchars($data["type"]);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO laptop (nomerseri, namalaptop, model, type, gambar) VALUES ('$nomerseri', '$namalaptop', '$model', '$type', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Check if no image is uploaded
    if ($error === 4) {
        echo "<script>alert('Upload Gambar terlebih Dahulu!!!');</script>";
        return false;
    }

    // Check if the uploaded file is an image
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Upload Gambar!!!');</script>";
        return false;
    }

    // Check if the image size is too large (1MB limit)
    if ($ukuranFile > 1000000) {
        echo "<script>alert('Ukuran Gambar Terlalu Besar!!!');</script>";
        return false;
    }

    // Passed image validation, generate a unique filename
    $fileBaru = uniqid();
    $fileBaru .= '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $fileBaru);

    return $fileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM laptop WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nomerseri = htmlspecialchars($data["nomerseri"]);
    $namalaptop = htmlspecialchars($data["namalaptop"]);
    $model = htmlspecialchars($data["model"]);
    $type = htmlspecialchars($data["type"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE laptop SET nomerseri = '$nomerseri', namalaptop = '$namalaptop', model = '$model', type = '$type', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM laptop 
                WHERE
                nomerseri LIKE '%$keyword%' OR
                namalaptop LIKE '%$keyword%' OR
                model LIKE '%$keyword%' OR
                type LIKE '%$keyword%'
                ";

    return query($query);
}


?>