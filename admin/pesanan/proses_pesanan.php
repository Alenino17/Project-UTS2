<?php
// Include file koneksi database
require_once '../dbkoneksi.php';

// Ambil data dari form
$_tanggal = $_POST['date'];
$_product_id = $_POST['product_id'];
$_quantity = $_POST['qty'];
$_order_number = $_POST['order_number'];
$_total_price = $_POST['total_price'];
$_customer_id = $_POST['customer_id'];


$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[] = $_tanggal;
$ar_data[] = $_product_id;
$ar_data[] = $_quantity;
$ar_data[] = $_order_number;
$ar_data[] = $_total_price;
$ar_data[] = $_customer_id;



// Cek aksi yang dilakukan: Simpan atau Update
if ($_proses == "Simpan") {
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO `order` (date,product_id,qty,order_number,total_price,customer_id) VALUES (?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[] = $_POST['id'];
    $sql = "UPDATE `order` SET date=?,product_id=?,qty=?, order_number=?,total_price=?,customer_id=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar produk
header('location:../pesanan.php');