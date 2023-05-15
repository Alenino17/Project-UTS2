<?php
require_once 'dbkoneksi.php';
?>

<?php
// Mendapatkan nilai id dari parameter GET
$_id = $_GET['id'];

// Membuat query SQL untuk mengambil data produk dengan id tertentu
$sql = "SELECT * FROM product WHERE id=?";
$st = $dbh->prepare($sql);

// Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
$st->execute([$_id]);

// Mengambil hasil query dan menyimpannya ke dalam variabel $row
$row = $st->fetch();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<div class="container m-5">
    <!-- Menampilkan data produk dalam bentuk tabel -->
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>ID</td>
                <td><?= $row['id'] ?></td>
            </tr>
            <tr>
                <td>KODE Produk</td>
                <td><?= $row['sku'] ?></td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td><?= $row['name'] ?></td>
            </tr>
            <tr>
                <td>Harga Beli Produk</td>
                <td><?= $row['purchase_price'] ?></td>
            </tr>
            <tr>
                <td>Harga JuaL Produk</td>
                <td><?= $row['sell_price'] ?></td>
            </tr>
            <tr>
                <td>Jenis Produk</td>
                <td>
                    <?php
                    $sqljenis = "SELECT * FROM product_type WHERE id = " . $row['product_type_id'];
                    $rsjenis = $dbh->query($sqljenis);
                    $rowjenis = $rsjenis->fetch();
                    echo $rowjenis['name'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Minimal Stok Produk</td>
                <td><?= $row['min_stock'] ?></td>
            </tr>
            <tr>
                <td>Stok Produk</td>
                <td><?= $row['stock'] ?></td>
            </tr>
            <tr>
                <td>Restock Produk</td>
                <td>
                    <?php
                    $sqljenis = "SELECT * FROM restock WHERE id = " . $row['restock_id'];
                    $rsjenis = $dbh->query($sqljenis);
                    $rowjenis = $rsjenis->fetch();
                    echo $rowjenis['restock_number'];
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>