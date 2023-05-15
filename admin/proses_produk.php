<?php
// Include file koneksi database
require_once 'dbkoneksi.php';

// Ambil data dari form
$_kode = $_POST['sku'];
$_name = $_POST['name'];

$_jenis_id = $_POST['product_type_id'];
$_stok = $_POST['stock'];
$_sell_price = $_POST['sell_price'];
$_purchase_price = $_POST['purchase_price'];
$_min_stock = $_POST['min_stock'];
$_restock_id = $_POST['restock_id'];


$_proses = $_POST['proses'];

// Simpan data ke dalam array
$ar_data[] = $_kode;
$ar_data[] = $_name;
$ar_data[] = $_jenis_id;
$ar_data[] = $_stok;
$ar_data[] = $_min_stock;
$ar_data[] = $_restock_id;
$ar_data[] = $_purchase_price;
$ar_data[] = $_sell_price;


// Cek aksi yang dilakukan: Simpan atau Update
if ($_proses == "Simpan") {
    // Jika Simpan, buat SQL INSERT
    $sql = "INSERT INTO product (sku,name,product_type_id,stock,min_stock,restock_id,purchase_price,sell_price) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    // Jika Update, tambahkan ID ke array dan buat SQL UPDATE
    $ar_data[] = $_POST['id'];
    $sql = "UPDATE product SET sku=?,name=?,product_type_id=?,stock=?,min_stock=?,restock_id=?,purchase_price=?,sell_price=? WHERE id=?";
}

// Jika ada perintah SQL, jalankan perintah prepare dan execute dengan array data
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

// Redirect ke halaman daftar product
header('location:index.php');
