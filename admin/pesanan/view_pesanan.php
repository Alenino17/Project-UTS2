<?php
require_once '../dbkoneksi.php';
?>

<?php
// Mendapatkan nilai id dari parameter GET
$_id = $_GET['id'];

// Membuat query SQL untuk mengambil data produk dengan id tertentu
$sql = "SELECT * FROM `order` WHERE id=?";
$st = $dbh->prepare($sql);

// Menjalankan query dengan parameter id yang telah didapatkan sebelumnya
$st->execute([$_id]);

// Mengambil hasil query dan menyimpannya ke dalam variabel $row
$row = $st->fetch();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
                <td>Order Number</td>
                <td><?= $row['order_number'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Pesanan</td>
                <td>
                    <?php
                    $date = date_create($row['date']);
                    echo date_format($date, 'd-m-Y');
                    ?>
                </td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td>
                    <?php
                    $sqljenis = "SELECT * FROM product WHERE id = " . $row['product_id'];
                    $rsjenis = $dbh->query($sqljenis);
                    $rowjenis = $rsjenis->fetch();
                    echo $rowjenis['name'];
                    ?>
                </td>
            </tr>
            <tr>
                <td>QTY</td>
                <td><?= $row['qty'] ?></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><?= $row['total_price'] ?></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td>
                    <?php
                    $sqljenis = "SELECT * FROM customer WHERE id = " . $row['customer_id'];
                    $rsjenis = $dbh->query($sqljenis);
                    $rowjenis = $rsjenis->fetch();
                    echo $rowjenis['name'];
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>