<?php
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_nama_supplier = $_POST['name'];
$_nomor_telepon = $_POST['phone'];
$_alamat = $_POST['address'];
$_nama_kontak = $_POST['contact_name'];

$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data = [
    $_nama_supplier,
    $_nomor_telepon,
    $_alamat,
    $_nama_kontak
];



// Cek aksi yang dilakukan: Simpan atau Update
if ($_proses == "Simpan") {
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO supplier (name, phone, address, contact_name) VALUES (?,?,?,?)";
} else if ($_proses == "Update") {
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[] = $_POST['id'];
    $sql = "UPDATE supplier SET name=?, phone=?, address=?, contact_name=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:../supplier.php');
